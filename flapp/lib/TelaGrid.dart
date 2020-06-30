import 'package:flutter/material.dart';
import 'Class.dart';
import 'package:http/http.dart' as http;
import 'dart:async';
import 'dart:convert';
 

Future<List<Produtos>> fetchCases(http.Client client) async {
  //final response = await client.get('https://fabegalo.000webhostapp.com/Projects/API%20-%20COVID/');

  String teste = '[{"ID":"1","0":"1","Produto":"Banana","1":"Banana","Codigo":"BA0001","2":"BA0001","Quantidade":"0","3":"0"},{"ID":"2","0":"2","Produto":"Abacaxi","1":"Abacaxi","Codigo":"AI0002","2":"AI0002","Quantidade":"0","3":"0"}]';

  return parseCases(teste);
}

List<Produtos> parseCases(js) {
  final parsed = json.decode(js).cast<Map<String, dynamic>>();

  return parsed.map<Produtos>((json) => Produtos.fromJson(json)).toList();
}



class TelaGrid extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text('Listagem')),
        //body: DropDown(),
        body: FutureBuilder<List<Produtos>>(
        future: fetchCases(http.Client()),
        builder: (context, snapshot) {
          if (snapshot.hasError) print(snapshot.error);

          return snapshot.hasData
              ? DropDown(produto: snapshot.data)
              : Center(child: CircularProgressIndicator());
        },
      )
    );
  }
}
 
class DropDown extends StatefulWidget {
  final List<Produtos> produto;
  DropDown({Key key, this.produto}) : super(key: key);
  
  @override
  _DropDownState createState() => _DropDownState(produto: produto);
}
 
class _DropDownState extends State<DropDown> {
  GlobalKey<RefreshIndicatorState> refreshKey;
  List<Produtos> produto;
  _DropDownState({Key key, this.produto});

  // Default Drop Down Item.
  String dropdownValue = 'BA0001';
 
  // To show Selected Item in Text.
  String holder = '' ;
 
  List <String> actorsName = [
    'BA0001', 
    'AI0002', 
    'Leonardo DiCaprio'
    ];
 
  void getDropDownItem(){
    setState(() {
      holder = dropdownValue ;
    });
  }
 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child :
        Column(children: <Widget>[
 
          DropdownButton<String>(
            value: dropdownValue,
            icon: Icon(Icons.arrow_drop_down),
            iconSize: 24,
            elevation: 16,
            style: TextStyle(color: Colors.red, fontSize: 18),
            underline: Container(
              height: 2,
              color: Colors.deepPurpleAccent,
            ),
            onChanged: (String data) async {
                var client = http.Client();
                //final response = await client.get('https://fabegalo.000webhostapp.com/Projects/API%20-%20COVID/');
                String teste2 = '';
                if(data == 'BA0001'){
                  teste2 = '[{"ID":"1","0":"1","Produto":"Banana","1":"Banana","Codigo":"BA0001","2":"BA0001"}]';
                }else{
                  teste2 = '[{"ID":"1","0":"1","Produto":"Banana","1":"Banana","Codigo":"BA0001","2":"BA0001","Quantidade":"0","3":"0"},{"ID":"2","0":"2","Produto":"Abacaxi","1":"Abacaxi","Codigo":"AI0002","2":"AI0002","Quantidade":"0","3":"0"}]';
                }

                List<Produtos> query = parseCases(teste2);
                setState(() {
                  dropdownValue = data;
                  produto = query;
                });
            },
            items: actorsName.map<DropdownMenuItem<String>>((String value) {
              return DropdownMenuItem<String>(
                value: value,
                child: Text(value),
              );
            }).toList(),
          ),
          
          Expanded(
            child: buildGridView(produto, context),
          ),

          RaisedButton(
            child: Text('Confirmar Alterações'),
            onPressed: getDropDownItem,
            color: Colors.green,
            textColor: Colors.white,
            padding: EdgeInsets.fromLTRB(12, 12, 12, 12),
            ),
 
          ]),
      ),
    );
  }

  void addQtde(index){
    produto[index].qtde = produto[index].qtde + 1;
    setState(() {
      
    });
  }

  void removeQtde(index){
    if(produto[index].qtde == 0){
      return;
    }
    produto[index].qtde = produto[index].qtde - 1;
    setState(() {
      
    });
  }

  Widget buildGridView(produto, context) {
    var size = MediaQuery.of(context).size;

    /*24 is for notification bar on Android*/
    final double itemHeight = (size.height - kToolbarHeight - 24) / 2;
    final double itemWidth = size.width / 2;

    return GridView.count(
      shrinkWrap: true,
      crossAxisCount: 2,
      //childAspectRatio: 1,
      childAspectRatio: (itemWidth / itemHeight),
      children: List.generate(produto.length, (index) {
        // Area area = Area(name: arg.name,total: arg.total, totaldead: arg.totaldead, totallive: arg.totallive); //retorna os valores de cada pais
        // int ativos = 0;
        // int aux1;
        // int aux2;
        // aux1 = int.parse(area.totaldead);
        // aux2 = int.parse(area.totallive);
        // ativos = int.parse(area.total);
        // ativos = ativos - (aux1 + aux2); //conta os casos ativos
        return Card(
          child: Stack(
            children: <Widget>[
              new Center(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.center,
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    Text('Produto: ' + produto[index].produto),
                    Text('CODIGO: ' + produto[index].codigo, style: TextStyle(color: Colors.black, fontSize: 20)),
                    Text(''),
                    
                    Row( children: <Widget>[
                      Spacer(), 
                      Container(
                        width: 60,
                        height: 50,
                        margin: EdgeInsets.all(2),
                        child: FlatButton(
                          child: Icon(Icons.remove_circle_outline),
                          color: Colors.red,
                          textColor: Colors.white,
                          onPressed: () {
                            removeQtde(index);
                          },
                        ),
                      ),
                      Card(
                        child: Padding(
                          padding: EdgeInsets.all(15),
                          child: Text(produto[index].qtde.toString()),
                        ),
                      ),
                      Container(
                        width: 60,
                        height: 50,
                        margin: EdgeInsets.all(2),
                        child: FlatButton(
                          child: Icon(Icons.add_circle_outline),
                          color: Colors.green,
                          textColor: Colors.white,
                          onPressed: () {
                            addQtde(index);
                          },
                        ),
                      ),
                      Spacer(), 
                  ])
                  ],
              ),
              )
            ],
          ),
        );
      }),
    );
  }
}


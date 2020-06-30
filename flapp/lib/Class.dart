class Produtos {
  String id;
  String produto;
  String codigo;
  String quantidade;
  int qtde;
  //List<Area> areas;

  Produtos({this.id, this.produto, this.codigo, this.quantidade, this.qtde});

  factory Produtos.fromJson(Map<String, dynamic> json) {
    //var streetsFromJson  = json['areas'];
    //print(streetsFromJson.runtimeType);
    // List<String> streetsList = new List<String>.from(streetsFromJson);
    //List<String> streetsList = streetsFromJson.cast<String>();
    //var list = json['areas'] as List;
    //print(list.runtimeType);
    //List<Area> areaList = list.map((i) => Area.fromJson(i)).toList();

    return Produtos(
      id: json['ID'] as String,
      produto: json['Produto'] as String,
      codigo: json['Codigo'] as String,
      quantidade: json['Quantidade'] as String,
      qtde: 0,
     //update: json['update'] as String,
      //areas: areaList
    );
  }
}
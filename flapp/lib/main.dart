import 'package:flutter/material.dart';
import 'TelaGrid.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      routes: {
        "/TelaGrid"         :  (context) => TelaGrid(),
      },
      title: 'Baixa de Estoque',
      theme: ThemeData(
        primarySwatch: Colors.green,
      ),
      home: new TelaGrid(),
    );
  }
}
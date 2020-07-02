<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        #conteudo{
            /*
            margin-left: 20%;
            margin-top: 5%;
            margin-bottom: 5%;
            */
            padding:5% 8% 5% 20%;
        }
        body{
            background-color: rgba(0, 0, 0, 0.082);
        }
        
        #tab{
            padding: 10px;
            margin-left: 0%;
            margin-top:10px;
            border:solid 1px black;
            border-radius: 15px;
            /*
            background-color: rgba(2, 9, 73, 0.822);
            */
            background: linear-gradient(to right,#007ada,#00eaba)
        }
        #tab td{
            padding: 5px;

        }

        #tela{
            margin-top:0px;
            padding: 8px;
            width: 310px;
            height: 40px;
            line-height: 40px;
            font-size: 36px;
            text-align: right;
             /*
            color:rgba(255, 0, 0, 0.856);
            text-shadow: 1px 1px 1px #bbbbbb;
            */
            font-size: 32px;
            font-weight: bolder;
            background-color: azure;
            border-radius: 5px;


            color: black;
            text-shadow: 2px 2px 2px #fff;
            background: linear-gradient(to right,#007ada,#00eaba);
            border-radius:8px;
            padding: 6px;
            border:1px solid #fff;
            box-shadow: 2px 2px 2px black;
        }
        #tab button.btn{
            padding:12px;
            width: 65px;
            height: 45px;
            box-shadow: 2px 2px 2px black;
            font-size: 20px;
            font-weight: bolder;
            border:none;
            border-radius: 8px;


            background: rgba(0,0,0,0.3);
            color: #fff;
        }
        #visor{
            font-size: 30px;
            font-weight: bolder;
            text-align: right;
            color: #f5f5f5;
            text-shadow: 2px 2px 2px black;
            background: linear-gradient(to right,#007ada,#00eaba);
            border-radius:8px;
            padding: 6px;
            border:1px solid #fff;
            box-shadow: 2px 2px 2px black;
        }
        span#visorOper{
            font-size: 22px;
            font-weight: bolder;
            text-align: right;
            color: rgb(247, 225, 225);
            text-shadow: 4px 4px 4px black;
            font-family: Arial Black , sans-serif;
        }
        h2#mens{
            margin-bottom: 0px;
            font-size: 22px;
            font-weight: bolder;
            color: rgb(247, 225, 225);
            text-shadow: 4px 4px 4px black;
            font-family: Arial Black , sans-serif;
        }

        table#tab tr td button:hover{

            background: rgba(0,0,0,0.2);
            box-shadow: 4px 4px 4px black;
            font-size: 25px;
            text-align: center;

        }
        
    </style>
         
</head>

<body onload="addMensagem()">
    

   


        <div id="conteudo">

            <table border="0" id="tab">
            
                <tr><td colspan="4"><h2 id="mens"></h2></td></tr>
               
                <tr>
                    <td colspan="4"><h3 id="tela" ></h3></td>
                </tr>
                <tr>
                    <td colspan="3"><span  id="visor">Digite...</span></td><td><button onmouseup="limpar()"  class="btn">CE</button></td>
                </tr>
                <tr>
                    <td colspan="3"><span  id="visorOper"></span></td><td><button onmouseup="apagar()"  class="btn">C</button></td>
                </tr>
                
                
                <tr>
                    <td><button onclick="clicou(7)" id="btn1" class="btn" value="7">7</button></td>
                    <td><button onclick="clicou(8)" id="btn2" class="btn" value="8">8</button></td>
                    <td><button onclick="clicou(9)" class="btn">9</button></td>
                    <td><button onclick="divisao()" class="btn">/</button></td>
                </tr>
                <tr>
                    <td><button onclick="clicou(4)" class="btn">4</button></td>
                    <td><button onclick="clicou(5)" class="btn">5</button></td>
                    <td><button onclick="clicou(6)" class="btn">6</button></td>
                    <td><button onclick="multiplicar()" class="btn">X</button></td>
                </tr>
                <tr>
                    <td><button onclick="clicou(1)" class="btn">1</button></td>
                    <td><button onclick="clicou(2)" class="btn">2</button></td>
                    <td><button onclick="clicou(3)" class="btn">3</button></td>
                    <td><button onclick="subtrair()" class="btn">-</button></td>
                </tr>
                <tr>
                    <td><button onclick="clicou('.')" class="btn">.</button></td>
                    <td><button onclick="clicou(0)" class="btn">0</button></td>
                    <td><button onclick="igual()" class="btn">=</button></td>
                    <td><button onclick="somar()" class="btn">+</button></td>
                </tr>

            </table>
           


        </div>


        <script type="text/javascript">

            //------------------------------VARIÁVEIS-----------------------------
            var acumula = 0 ;
            var operacao = null;
            var data = new Date()
            var hora = data.getHours()
            //var hora = 4
            var mensagem;

            if(hora < 7){
                mensagem = "Boa Madrugada"
            }else if(hora < 12){
                mensagem = "Bom dia"
            }else if(hora < 18){
                mensagem = "Boa tarde"
            }else{
                mensagem = "Boa Noite"
            }
            
            function addMensagem(){
                var visorOper = document.getElementById('mens')
                visorOper.innerText = mensagem
            }

//-----------------------------------COLOCA OS NUMEROS NA TELA----------------------------------

            function clicou(valor){

                valor = String(valor)
                var tela = document.getElementById('tela')
                var atual =  String(tela.innerText)
                var novo = atual + valor
                tela.innerText = novo.substring(0 , 19)
    
            }

//---------------------------------------------------------------------------------------------

//------------------------------APAGA NUMEROS DA TELA------------------------------------------

            function apagar(){

                var tela = document.getElementById('tela').innerText
                var novoNum = tela.substring(0 , (tela.length - 1))
                var novaTela = document.getElementById('tela')
                novaTela.innerText = novoNum
                
            }

//--------------------------------------------------------------------------------------------

//------------------------------LIMPAR CALCULADORA--------------------------------------------

            function limpar(){
                acumula = 0 
                document.getElementById('tela').innerHTML = ''
                document.getElementById('visor').innerHTML = 'Digite...'
                var visorOper = document.getElementById('visorOper')
                visorOper.innerText = ''
            }

//-------------------------------------------------------------------------------------------


//--------------------------OPERAÇÕES--------------------------------------------------------

            function somar(){

                operacao = 'Adicao'
                //-------------seleciona tela e visor---------
                var visor = document.getElementById('visor')
                var tela = document.getElementById('tela')
                var visorOper = document.getElementById('visorOper')
                visorOper.innerText = operacao
                //-------------------------------------------

                var n1 = Number(tela.innerText)
                tela.innerText = ''
                acumula = acumula + n1
                valor = String(acumula)
                valor = valor.substring(0,12)
                visor.innerText = valor
                

            }




            function divisao(){

                operacao = 'Divisao'
                //-------------seleciona tela e visor---------
                var tela = document.getElementById('tela')
                var visor = document.getElementById('visor')
                var visorOper = document.getElementById('visorOper')
                visorOper.innerText =  operacao
                //-------------------------------------------
                var n1 = Number(tela.innerText)

                if(acumula == 0  && tela.innerText != ''){

                    acumula = n1
                    tela.innerText = ''
                    visor.innerText = acumula
                    
                }else if(tela.innerText != '' ){

                    tela.innerText =  ''
                    acumula = acumula / n1
                    valor = String(acumula)
                    valor = valor.substring(0,12)
                    visor.innerText = valor

                }
                
            } 

            function multiplicar(){

                operacao = 'Multiplicacao'
                //-------------seleciona tela e visor---------
                var tela = document.getElementById('tela')
                var visor = document.getElementById('visor')
                var visorOper = document.getElementById('visorOper')
                visorOper.innerText = operacao
                //-------------------------------------------
                var n1 = Number(tela.innerText)

                if(acumula == 0  && tela.innerText != ''){
                    
                    acumula = n1
                    tela.innerText = ''
                    visor.innerText = acumula
                    
                }else if(tela.innerText != '' ){

                    tela.innerText =  ''
                    acumula = acumula * n1
                    valor = String(acumula)
                    valor = valor.substring(0,12)
                    visor.innerText = valor

                }
                
            }

            function subtrair(){
                operacao = 'Subtracao'
                //-------------seleciona tela e visor---------
                var tela = document.getElementById('tela')
                var visor = document.getElementById('visor')
                var visorOper = document.getElementById('visorOper')
                visorOper.innerText =  operacao
                //-------------------------------------------
                var n1 = Number(tela.innerText)

                if(acumula == 0  && tela.innerText != ''){
                    
                    acumula = n1
                    tela.innerText = ''
                    visor.innerText = acumula
                    
                }else if(tela.innerText != '' ){

                    tela.innerText =  ''
                    acumula = acumula - n1
                    valor = String(acumula)
                    valor = valor.substring(0,12)
                    visor.innerText = valor

                }
                
            }  

            function igual(){

                //-------------seleciona tela e visor---------
                var tela = document.getElementById('tela')
                var visor = document.getElementById('visor')
                //--------------------------------------------
                var n1 = Number(tela.innerText)

                if(tela.innerText != ''){

                    switch(operacao){
                        case 'Adicao':
                            acumula = acumula + n1 
                            tela.innerText = ''
                            valor = String(acumula)
                            valor = valor.substring(0,12)
                            visor.innerText = valor
                        break
                        case 'Divisao':
                            acumula = acumula / n1
                            tela.innerText = ''
                            valor = String(acumula)
                            valor = valor.substring(0,12)
                            visor.innerText = valor
                        break
                        case 'Multiplicacao':
                            acumula = acumula * n1
                            tela.innerText = ''
                            valor = String(acumula)
                            valor = valor.substring(0,12)
                            visor.innerText = valor
                        break
                        case 'Subtracao':
                            acumula = acumula - n1
                            tela.innerText = ''
                            valor = String(acumula)
                            valor = valor.substring(0,12)
                            visor.innerText = valor
                        break
                    }
                }



            }
      
        </script>

</body>
</html>
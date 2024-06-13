<?php 
header ('Content-type: text/html; charset=UTF-8');
require_once "suporte.php";
//estancia o chamada processo como os dados

   $exec    = new Processo();
   $campos = $exec->lista('ucase(cam_campo) as cam_campo', 'tb_campos');// lista os campos 
   $colunax = '';
   $colunay = '';
   $tabela  =  isset($_GET['tabela'])? $_GET['tabela'] : 'tb_cadastro';

   //montas as colunas do cabeçalho da tabela referente aos campos
   foreach ($campos as $item) {
      foreach ($item as $value) {
         $colunax .= $value.',';
         $colunay .= '<td>'.$value.'</td>';
      }
   }
   
   //cria a lista de cadastros
   $lista = $exec->lista(
      'id,'.$colunax.
      "termos,informacoes,cad_equipamento, date_format(cad_cadastro ,'%d-%m-%Y %H:%i:%s') AS cadastro", 
      $tabela);

// monta a tabela como os dados
      $exel   = '<table border="1"  bordercolor="piple">';
      $exel  .= '<tr style="background:#68228B;color:#FFF">';
      $exel  .= '<td>ID</td>';
      $exel  .= $colunay;
      $exel  .= '<td>TERMOS</td>';
      $exel  .= '<td>INFORMACOES VIA WHATSAPP</td>';
      $exel  .= '<td>DISPOSITIVO</td>';
      $exel  .= '<td>CADASTRO</td>';
      $exel  .= '</tr>';

      foreach ($lista as $dados) {
      $exel .= '<tr>';

      foreach ($dados as $key => $valor) {

      $exel .= '<td>'.$valor.'</td>';

      if($key == 'novo'){
      break;
      }
      }

      $exel .= '</tr>';
      }

      $exel .= '</table>';
   //monta o excel
   $arquivo = 'Lista_Cadastro_' . date("Ymd-His") .'.xls';
   header('Cache-Control: no-cache, must-revalidate');
   header('Pragma: no-cache');
   header('Content-Type:application/x-msexcel');
   header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
   echo $exel;

?>
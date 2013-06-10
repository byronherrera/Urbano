<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="css/template.css" type="text/css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Administrador Fiat</title>
    <style type="text/css">
        a:link {
            text-decoration: none;
            color: #FFFFFF;
        }

        a:visited {
            text-decoration: none;
            color: #ffffff;
        }

        a:hover {
            text-decoration: none;
            color: red;
        }

        a:active {
            text-decoration: none;
            color: #FFFFFF;
        }

        .cont {
            font-family: 'FiatRegular' !important;
        }

        .current, .current a:visited, .current a:link {
            color: #fff;
            background-color: rgb(141, 20, 34);;
        }

        table td a {
            font-family: 'FiatRegular' !important;
            font-size: 12px !important;
        }

        td {
            height: 4px !important;

        }

        table td.menu:hover {
            color: #fff !important;
            background-color: rgb(141, 20, 34);
        !important;
        }

        table td.menu a:hover {
            color: #fff !important;
            cursor: pointer;
        }

        #select {
            color: rgb(141, 20, 34);;
            font-family: 'FiatRegular' !important;
            font-size: 12px !important;
            height: 25px;
            width: 210px !important;
            text-align: right !important;
            padding-top: 0px !important;
        }
    </style>
    <?php
    include "connections/conexion.php";
    $array [0] = "";
    $array [1] = "urba_form_infoCorporativa";
    $array [2] = "urba_form_servCliente";
    $array [3] = "urba_form_trabajaNosotros";
    $cat = $_GET['cat'];

    if (isset($_GET["pais"])) {
        $pais = $_GET["pais"];
        $filtraId = " WHERE pais= '$pais'";
    } else {
        $filtraId = "";
    };

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * 10;
         $query = "SELECT *  FROM " . $array[$cat] . $filtraId . " order by id desc LIMIT " . $start_from . ", 10";
    $result = mysql_query($query);
    ?>


</head>
<body>
<div id="top-bar">
</div>
<div id="main-wrapper"> <!--start wrapper widht: 1000px-->
    <div id="top-menu">
    </div>
    <div id="main-menu">
        <div id="back"
             style="color:#FFFFFF; font-family: FiatRegular; float:right; margin-top:11px; margin-right:25px; text-transform:uppercase;"><?php echo('Administrador de Contactos'); ?> </div>
    </div>
    <div id="logo-wrapper">
        <div id="logo">
            <h1></h1>
        </div>
    </div>
    <div id="allRequest" style="font-family: FiatRegular; margin-left:40px;">
        <table width="960" border="0">
            <tr>
                <td colspan="2"
                    style="font-family: FiatRegular; font-size:12px; font-weight:bolder; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px; background-color:#CCCCCC; color:rgb(141,20,34);; text-align:center; line-height:21px; height:65px;">
                    Categoria a Responder:
                </td>
                <td colspan="11" align="left"
                    style="background-color:#CCCCCC; color:rgb(141,20,34);; text-align:center; line-height:21px; height:65px;">
                    <FORM ID="selectorInner" style="background-color:#CCCCCC ;color:rgb(141,20,34); !important; "
                          name="myform">
                        <SELECT ONCHANGE="window.parent.location.href = this.options[this.selectedIndex].value;"
                                name="sel">
                            <option value="adminInfo.php?cat=1"
                                    style="font-family: FiatRegular; font-size:12px; line-height:15px;">Información corporativa
                            </option>
                            <option value="adminInfo.php?cat=2"
                                    style="font-family: FiatRegular; font-size:12px; line-height:15px; ">Servicio al Cliente
                            </option>
                            <option value="adminInfo.php?cat=3"
                                    style="font-family: FiatRegular; font-size:12px; line-height:15px;">Trabaje con nosotros
                            </option>
                        </SELECT>
                    </FORM>
                </td>
                <!--<td class="<?php  if ($cat == 1) {
                    echo 'current';
                }?> menu" width="60" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=1">Apoyo Tecnico</a></td>
    <td class="<?php  if ($cat == 2) {
                    echo 'current';
                }?> menu" width="77" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=2">Informacion Vehiculos</a></td>
    <td  class="<?php  if ($cat == 3) {
                    echo 'current';
                }?> menu" width="86" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=3">Informacion Repuestos</a></td>
    <td  class="<?php  if ($cat == 4) {
                    echo 'current';
                }?> menu" width="119" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=4">Informacion Accesorios</a></td>
    <td  class="<?php  if ($cat == 5) {
                    echo 'current';
                }?> menu" width="76" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=5">Informacion Test Drive</a></td>
    <td  class="<?php  if ($cat == 6) {
                    echo 'current';
                }?> menu" width="110" colspan="2" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=6">Informacion Cita Taller</a></td>
    <td  class="<?php  if ($cat == 7) {
                    echo 'current';
                }?> menu" width="83" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=7">Otros</a></td>
    <td  class="<?php  if ($cat == 8) {
                    echo 'current';
                }?> menu" width="83" style="font-family: FiatRegular; font-size:12px; padding-left:8px; padding-right:8px; line-height:15px; padding-top:5px; padding-bottom:5px;"><a href="adminInfo.php?cat=8">BT-50</a></td>-->
            </tr>
            <tr>
                <td colspan="5" style="padding-left:5px;"></td>
                <td colspan="2"></td>
                <td style="width:45px;padding-left:5px;"></td>
            </tr>
            <tr>
                <td align="center" style=" font-weight:bold; text-transform:uppercase; font-family:FiatRegular;">Fecha
                </td>
                <td align="center" style=" font-weight:bold; text-transform:uppercase; font-family:FiatRegular;">ID</td>
                <td align="left" style=" font-weight:bold; text-transform:uppercase; font-family:FiatRegular;">Nombre
                </td>
                <td align="left" style=" font-weight:bold; text-transform:uppercase; font-family:FiatRegular;">
                    Apellido
                </td>
                <td align="left" style=" font-weight:bold; text-transform:uppercase; font-family:FiatRegular;"
                    colspan="2">Comentario
                </td>
                <td colspan="2" style="font-family:FiatRegular; font-size:12px; font-weight:bold;" align="center">
                    Estado
                </td>
                <td style="width:45px;padding-left:5px; font-family:FiatRegular; font-size:12px; font-weight:bold;"
                    align="center">Accion
                </td>
                <?php if ($cat == 8 || $cat == 9 || $cat == 10) {
                echo '<td style="font-family:FiatRegular; font-size:12px; font-weight:bold;" align="center">Responsable</td>';
            } ?>
            </tr>
            <?php
            $count = 0;

            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                if ($count % 2 == 0) {
                    echo '<tr bgcolor="#F2F2F2">';
                } else {
                    echo '<tr bgcolor="#cccccc">';
                }
                echo '<td style="color:#333333;" align="left" >' . $row['fechaMensaje'] . '</td>';
                echo '<td style="color:#333333;" align="center" >' . $row['id'] . '</td>';
                echo '<td style="color:#333333; line-height:15px;">' . $row['nombre'] . '</td>';
                echo '<td style="color:#333333;">' . $row['apellido'] . '</td>';
                $rowLimit = $row['comentario'];
                $limitMsg = substr($rowLimit, 0, 120);
                echo '<td colspan="2" height="100" style="text-transform:lowercase; width:150px !important; line-height:18px; padding-top:5px; padding-bottom:5px; color:#333333;">' . $limitMsg . '...</td>';
                echo '<td style="width:25px !important;"></td>';
                if ($row['estadoMensaje'] == "Respondido") {
                    echo '<td style="width:139px !important; text-transform:uppercase; color:rgb(141,20,34); font-family:FiatRegular; font-size:10px !important;" >' . $row['estadoMensaje'] . '</td>';
                    echo '<td align="center" style=" width:195px; font-size:12px;"><a href="adminAnswer.php?id=' . $row['id'] . '&cat=' . $cat . '" style="background-color:rgb(141,20,34); color:#ffffff; padding-left:2px; padding-top:5px; padding-bottom:5px; padding-right:5px;  width:60px !important; -moz-border-radius: 8px;
border-radius: 8px;">';
                    echo"Ver Respuesta</a></td>";
                    echo '<td>' . $row['vendedor'] . '</td>';
                } else {
                    echo '<td style="width:139px !important; text-transform:uppercase; color:rgb(141,20,34); font-family:FiatRegular; font-size:10px !important;" >' . $row['estadoMensaje'] . '</td>';
                    echo '<td  align="center" style="width:195px !important; font-size:11px !important;"><a href="adminAnswer.php?id=' . $row['id'] . '&cat=' . $cat . '" style="background-color:#333333; color:#ffffff; padding-left:2px; padding-top:5px; padding-bottom:5px; padding-right:5px; width:60px !important; -moz-border-radius: 8px;
border-radius:8px;">';
                    echo"responder</a></td>";
                    echo'<td>' . $row['vendedor'] . '</td>';
                }
                echo '</tr>';
                $count++;
            }?>
            <tr>
                <td colspan="9" height="12"></td>
            </tr>
            <tr>
                <td bgcolor="#333333" colspan="9" align="center">
                    <?php
                    $query = "SELECT id FROM " . $array[$cat] . " order by id desc";
                    $result = mysql_query($query);
                    $row = ($result);
                    $total_records = mysql_num_rows($result);
                    $total_pages = ceil($total_records / 10);
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<a href='adminInfo.php?page=" . $i . "&cat=" . $cat . "'>" . $i . "</a> ";
                    };
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="maFootah" style="top:45px;">
        <div id="footer">  <br/>

            <div class="dashed_line">
                Todos los derechos reservados © 2013 Urbano
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    var sel = document.myform.sel;
    sel.selectedIndex =<?php echo $cat - 1;?>
</script>
</body>
</html>
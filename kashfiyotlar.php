<?php
$link = "oquvchi";
include "connect_db.php";
include("header.php");
include("Menu.php");
$left_menu = new Menu();
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<div class="menu-header">
    <span class="text-danger">||</span>
    <span style="text-transform: uppercase; font-family: Consolas;">Ixtiro va kashfiyotlar</span>
</div>
<br>
<div class="col-xs-12">
    <div class="col-xs-9">
        <?php
        $sql = mysql_query("SELECT * FROM ixtiro ORDER BY id");
        $rows = mysql_num_rows($sql);
        for($i = 0; $i < $rows; $i++){
            $kashId      = mysql_result($sql,$i,'id');
            $kashMavzu   = mysql_result($sql,$i,'mavzu');
            $kashImgLink = mysql_result($sql,$i,'imglink');
            $kashShort   = mysql_result($sql,$i,'short');
            $kashRead    = mysql_result($sql,$i,'tahrir');
            $kashLike    = mysql_result($sql,$i,'LikeCount');
            $kashAuthor   = mysql_result($sql,$i,'author');
            $kashDate    = mysql_result($sql,$i,'date');
            $kashDate    = date("d.m.Y",$kashDate);
            ?>

            <div style="width: 100%; padding: 0; margin-bottom: 10px;">
                <br>
                <table id="table-mojiza" class="table table-bordered" width="100%">
                    <tr>
                        <td colspan="2">
                            <table width="100%">
                                <tr>
                                    <td width="90%"><b style="float: left; left: 0px;"><?php print $kashMavzu; ?></b></td>
                                    <td>
                                        <button onclick="newsLike.add(<?php print $kashId; ?>)" class="btn btn-default pull-right h3">
                                            <span class="text-primary glyphicon glyphicon-thumbs-up"></span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="155" height="155">
                            <img width="100%" height="100%" src="<?php print URL.''.$kashImgLink; ?>">
                        </td>
                        <td style="text-align: justify;">
                            <?php print $kashShort; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span>
                                        <?php
                                        if($kashAuthor == "" || $kashAuthor == null){
                                            print "Administrator";
                                        }else{
                                            print $kashAuthor;
                                        };
                                        ?>
                                    </td>
                                    <td width="130">
                                        <span class="glyphicon glyphicon-time"></span>
                                        <?php print $kashDate; ?>
                                    </td>
                                    <td width="60">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        <?php print $kashRead; ?>
                                    </td>
                                    <td width="70">
                                        <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;
														<span id="LikeCount">
															<span><?php echo $kashLike; ?></span>
														</span>
                                    </td>
                                    <td width="70">
                                        <a href="discoveries.php?id=<?php print $kashId; ?>">
                                            <button class="pull-right btn btn-primary btn-sm text-justify"> &nbsp; Batafsil &nbsp; </button>
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
    </div>
    <div class="col-xs-3">
        <?php
          $left_menu->Oquvchi();
        ?>
    </div>
</div>
<?php
require("footer.php");
?>
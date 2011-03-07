<?php
$db = mysql_select_db ($array_db['db_site'],$cxn);
if (!$db) {
die ('Erreur : ' . mysql_error());
}
$news = mysql_query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 0,3");

if (mysql_num_rows($news) > 0)
{
	for($i = 0; $i < mysql_num_rows($news); $i++)
	{	
		$row_news = mysql_fetch_array($news);
		$commentaires = mysql_query("SELECT * FROM `commentaires` WHERE `news` = '".$row_news['id']."'");
		$nb_commentaires = mysql_num_rows($commentaires);

		if($nb_commentaires == 0) {
			$nb_commentaires = 'Aucun commentaire !';
		}
		else {
			$nb_commentaires = $nb_commentaires.' commentaires';
		}

?>
	<div class="post"> 
	<div class="post_header"><a href="<?php echo '?page=News&amp;id='.$row_news['id'].'#Contenu'; ?>"><?php echo $row_news['titre']; ?></a></div> 

	<div class="post_body" align="left"><?php echo nl2br($row_news['message']); ?>		
	<div class='news-post-down'> 
	<p> 
	<strong>Poster par <?php echo $row_news['auteur']; ?></strong> 
	<a href="<?php echo '?page=News&amp;id='.$row_news['id'].'#Commentaires'; ?>"><?php echo $nb_commentaires; ?></a> 
	</p> 
	</div> 
	</div> 

	<img src="styles/default/images/post_bottom.png" alt="" align="top" /> 
	</div>
	<center></center>
	<div style="height:4px"></div>  
<?php
	}
}else
{
?>
<div class="post"> 
	<div class="post_header"><a href="?news=112&page=0">Aucune nouveautés</a></div> 
	<div class="post_body" align="left">
		<p><font color="red">Aucunes nouveautés</font></p>
	</div> 

	<img src="styles/default/images/post_bottom.png" alt="" align="top" /> 
</div>
<center></center>
<div style="height:4px"></div> 
<?php
}
?>
<div class="post"> 
	<div class="post_header"><a href="?page=Archives">Archives</a></div> 
	<div class="post_body" align="left">
		<p><a href="?page=Archives"><font color="orange"><center>Pour accéder aux news plus ancienne, consultez les archives.</center></font></a></p>
	</div> 

	<img src="styles/default/images/post_bottom.png" alt="" align="top" /> 
</div>
<center></center>
<div style="height:4px"></div> 
				</div> 
			</td> 
		</tr> 
	</tbody>
</table> 

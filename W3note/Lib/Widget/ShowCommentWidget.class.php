<?php
class ShowCommentWidget extends Widget{
public function render($data){
	$data['content']=D('Comment')->limit(9)->order('id desc')->select();
	//$this->assign('newscoments',$newscoments);
	 $content  = $this->renderFile('ShowComment',$data);

return $content ;
} 
/*
public function render($data){
	$newscoments=D('Comment')->limit(9)->order('id desc')->select();
	//$this->assign('newscoments',$newscoments);
	 $html = $this->renderFile($data['tmpl'],$newscoments);

return $html;
} 
*/
}
?>
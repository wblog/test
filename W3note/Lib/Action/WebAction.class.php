<?php
class WebAction extends CommonAction {
   public function listarr(){
	     $listarr=array();
		 $listarr['tagslist']=D('Tag')->TagList('News');//标签列表
		 $listarr['announce']=D('Announce')->announce();//公告
		 $listarr['hotlist']=D('News')->Hot();//热点文章
		 $listarr['randlist']=D('News')->Rand();//随机文章
		 $listarr['catlist']=D('Columns')->Catlist('News', 1);//栏目列表
		 $listarr['dateList']=D('News')->DateList('News');//归档
	     return $listarr;
	   }   
   public function read() {            
		$readarr=$this->readaction('News');
		$listarr=$this->listarr();
		$carr= D('Comment')->gclist("id,username,inputtime,pid,nid,url,content,path,concat(path,'-',id) as bpath",array('nid'=>array('eq',$readarr['id'])));
        $this->assign('vo', $readarr['vo']);
		$this->assign('pageup', $readarr['pageup']);
		$this->assign('pagedown', $readarr['pagedown']);
		$this->assign('Catlist', $listarr['catlist']);
		$this->assign('recommends', $readarr['recommends']);
		$this->assign('tags', $listarr['tagslist']);
		$this->assign('DateList', $listarr['dateList']);
		$this->assign('hotlist', $listarr['hotlist']);
		$this->assign('randlist', $listarr['randlist']);	
		$this->assign('ctlist', $carr['list']); 
		$this->assign('page', $carr['page']);
		$this->assign('relalist', $this->relaread('News',$readarr['id'],'RelaNewsView'));   
		$this->assign('title', $title='');      
        $this->display();                             
       }
   
   public function tag() {//获取相关标签
         $this->getags('News','NewstagView');
		 $listarr=$this->listarr();
		 $this->assign('hotlist', $listarr['hotlist']);
		 $this->assign('Tagslist', $listarr['tagslist']);	
		 $this->assign('DateList', $listarr['dateList']);	
		 $this->assign('Catlist', $listarr['catlist']);
		 $this->assign('newslists', D('News')->newsinfo());
         $this->display();
    }	
   public function add(){
		$this->adddata('Comment');
		}
  public function tourl(){
	  $this->gettourl('Comment');
      }
   }
?>
<?php
class PageAction extends CommonAction {
	public function index() {
		$vo=$this->getone('Page',array('id'=>$_GET['id']));
		$listarr=$this->listarr();
		$this->assign('tags', $listarr['tagslist']);
		$this->assign('hotlist', $listarr['hotlist']);
		$this->assign('DateList', $listarr['dateList']);
		$this->assign('Catlist', $listarr['catlist']);
		$this->assign('vo',$vo);
		$this->display();
    }
	 public function about() {
		$about = M("Page");
		$vo = $about->where(array('id'=>1))->find();
		 $about->where('id='.$vo['id'])->setInc("hits",1);
		$listarr=$this->listarr();
		$this->assign('tags', $listarr['tagslist']);
		$this->assign('hotlist', $listarr['hotlist']);
		$this->assign('DateList', $listarr['dateList']);
		$this->assign('Catlist', $listarr['catlist']);
		$this->assign('vo',$vo);
		$this->display();
		
    }
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
	//下载
	public function getDownload() {
        //读取附件信息
           $id = $_GET['id'];
           $Attach = M('Attach');
		   $map['module']="Page";
           $attachs = $Attach->where($map)->order('uploadTime desc')->select();
            //模板变量赋值
           $this->assign("attachs", $attachs ? $attachs : '');
       }

      public function download() {
		   import("ORG.Util.Http");
          $id = $_GET['id'];
          $dao = M("Attach");
          $attach = $dao->where("id=" . $id)->find();
          $filename = $attach["savepath"] . $attach["savename"];
		  //$filename = $attach['url'];
        if (is_file($filename)) {
            if (!isset($_SESSION['attach_down_count_' . $id])) {
                $dao->setInc('downcount', "id=" . $id);
                $_SESSION['attach_down_count_' . $id] = true;
            }
            Http::download($filename, $attach->name);
        }
    }
	
   }
?>
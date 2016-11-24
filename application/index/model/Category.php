<?php
/*
* 这是一个成熟的模型，放入相应文件夹直接调用即可
*/
namespace app\index\model;
class Category extends \think\Model
{

    /*
    * 打开冰箱：从数据库取出所有数据，并放进缓存内
    * 即可独立输出也可以在其他位置调用
    */

    public function category_query($catid=0)
    {
        cache('category',null);//正式环境删除本行可减少一次查询
        if(!$result = cache('category')){
            $Category = new Category();
            $result = [];
            foreach($Category->order('displayorder asc,catid asc')->select() as $data){

                $result[$data['catid']] = $data->toArray();
            }
            cache('category',$result,0);
        }

        return $catid ? $result[$catid] : $result;//如果传入单个分类catid，那么直接返回就行，可用于列表页，大大降低查询次数
    }

    /*
    * 把大象放进冰箱：将第一步得到的数据集转化为无限级数组
    * 即可独立输出也可以在其他位置调用
    */

    public function category_tree($upid=0,$status='0,1'){
        $status = is_string($status) ? explode(',', $status) : $status;
        $result = [];

        foreach($this->category_query() as $catid=>$cat){
//dump($this->category_query());
            if($upid == $cat['upid'] && in_array($cat['status'],$status)){
                $cat['subcat'] = $this->category_tree($cat['catid'],$status);
                $result[] = $cat;
            }
        }
        return $result;
    }

    /*
    * 关上冰箱门：用于实际用途，将多级数据传入，转化为前端html代码
    * 该html的转化结果可从第一步中获取方式不同来实现从哪一级开始展示
    * 本函数只是师范函数，实际运用中只需要修改这个函数结构体就能完全实现仿网易盖楼效果
    */

    public function category_html($categorys,$depth=0){
        $depth_html = $html = '';
        for ($i=0; $i < $depth; $i++) {
            $depth_html .= '——';
        }
        foreach($categorys as $data){
            $html .= '<tr>';
            $html .= '<td class="center">'.$data['catid'].'</td class="center">';
            $html .= '<td class="center">'.$data['displayorder'].'</td>';
            $html .= '<td>'.$depth_html.$data['catname'].'</td>';
            $html .= '</tr>';
            if($data['subcat']){
                $html .= $this->category_html($data['subcat'],$depth+1);
            }
        }
        return $html;
    }
}
?>
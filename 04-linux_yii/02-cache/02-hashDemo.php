<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/5
 * Time: 15:48
 */

class nodeMeneger {
    //属性
    protected $nodes;//服务器节点
    protected $position;//节点在圆环的位置

    //哈希算法
    //hash
    public function _hash($var){
        //crc32 将字符串,通过hash算法,转换成0-2的32次方的一个数
        //范围:0-40多亿
        return sprintf('%u',crc32($var));//无符号的整数
    }

    //核心分布逻辑
    //lookup
    public function lookup($key)
    {
        //计算出key对应的点的位置
        $keyPort = $this->_hash($key);

        //将数组的指针位置重置
        reset($this->position);
        //虚拟节点的第一个位置
        //key 取当前数组的指针位置
        $resNode = key($this->position);

        foreach ($this->position as $port => $node){

            //判断key落点的位置,找到相应的服务节点
            if ($keyPort <= $port){
                $resNode =  $node;
                break;
            }
        }

        return $resNode;
    }


    //添加节点
    //addNode
    public function addNode($node)
    {
        //$this->nodes[$node][]='';

        //虚拟节点个数
        $vnum = 64;
        for ($i = 0;$i<$vnum ;$i++){

            //虚拟出来的节点
            $vnode = $node.'_'.$i;
            //hash计算
            $vport = $this->_hash($vnode);

            //将虚拟节点跟真实节点对应
            $this->position[$vport] = $node;

            $this->nodes[$node][]= $vport;
        }

        //对虚拟节点排序,相当于将虚拟节点一次放在圆环的准确位置上
        $this->resort($this->position);
    }

    //删除节点
    //deletanode
    public function deleteNode($node)
    {
        //清空虚拟节点
        foreach ($this->nodes[$node] as $port){
            unset($this->position[$port]);
        }
        //清空真实节点
        unset($this->nodes[$node]);

    }

    //节点位置排序
    //resort
    public function resort(&$arr)
    {
        ksort($arr);
    }
}


$m = new nodeMeneger();
$m->addNode('A');
$m->addNode('B');
$m->addNode('C');
$m->addNode('D');
$m->addNode('F');


echo  'hash-key结果'.$m->_hash('name');
echo '</br>';
echo 'key存放的真实节点'.$m->lookup('name');



print_r($m);
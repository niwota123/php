<?php

//ͶƱ
//˲��Ĵ�������,�ȷ���redis��
//��������̨����С����,С������Ҫ�������ݽ���
//���ݽ���:��redis������д�뵽���ݿ�
//���ݽ���:�������ݽ���,��������������(redis�е�����),������(���������ݿ������)


//��3���û�,��������ͶƱ
//
//���ݿ�  vote��
//vid(ÿһƱid) uid(Ͷ��˭��Ʊ) ip(ͶƱ��ip) time(ͶƱ��ʱ��)
//

//2��PHP�ļ�
//1,ͶƱ�ļ�(��ʵʩ��ͶƱ����,���浽redis)
//2,�������ݴ����ļ�(��̨��redis���ݱ���sql��)

//redis.php  ͶƱ�ļ�
//change.php �������ݽ���


//redis.php �߼�
//1,��ҳ��ȡ�û��ύ������
//2,���浽redis��

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//ģ��ͶƱ����
$uid = mt_rand(1, 3);//���ָ��ͶƱ��Ա
$time = time();
$ip = '127.0.0.1';

//����
$voteid = $redis->incr('global_voteid');

//����Щ���ݱ��浽redis��
// vote:id:uid
// vote:id:time
// vote:id:ip

$uid_key = 'vote:'.$voteid.':uid';
$time_key = 'vote:'.$voteid.':time';
$ip_key = 'vote:'.$voteid.':ip';

$redis->set($uid_key,$uid);
$redis->set($time_key,$time);
$redis->set($ip_key,$ip);


// echo
// $redis->get($uid_key),
// $redis->get($time_key),
// $redis->get($ip_key);


?>
<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%teacher_old}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $xingbie
 * @property string $xingge
 * @property string $sanchang
 * @property string $xuexiao
 * @property string $xiaoqu
 * @property string $xueli
 * @property string $nianji
 * @property string $addtime
 * @property integer $login_time
 * @property string $name
 * @property string $pingjun
 * @property string $jiguan
 * @property string $pingkun
 * @property string $liuxiao
 * @property string $yingyu
 * @property string $gaozhongzk
 * @property string $zuanye
 * @property string $yuyan
 * @property string $phone
 * @property string $qq
 * @property string $msn
 * @property string $jinneng
 * @property string $pimg
 * @property string $type
 * @property string $jiaoshoukc
 * @property string $jiaoshoudq
 * @property string $time1
 * @property string $time2
 * @property string $gk_zong
 * @property string $gk_yuwen
 * @property string $gk_sushu
 * @property string $gk_yingyu
 * @property string $gk_zonghe
 * @property string $jy_sushu
 * @property string $jy_yingyu
 * @property string $jy_qita
 * @property string $jy_zong
 * @property string $jj_duixiang
 * @property string $jj_shixing
 * @property string $jj_dizhi
 * @property string $jj_jingyan
 * @property string $zhenshu
 * @property string $jieshao
 * @property string $beizu
 * @property string $time
 * @property string $a1
 * @property string $a2
 * @property string $a3
 * @property string $a4
 * @property string $a5
 * @property string $a6
 * @property string $a7
 * @property string $b1
 * @property string $b2
 * @property string $b3
 * @property string $b4
 * @property string $b5
 * @property string $b6
 * @property string $b7
 * @property string $c1
 * @property string $c2
 * @property string $c3
 * @property string $c4
 * @property string $c5
 * @property string $c6
 * @property string $c7
 * @property string $content
 * @property string $xueyuan
 * @property integer $graduation_time
 */
class TeacherOld extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher_old}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'xingbie', 'xingge', 'sanchang', 'xuexiao', 'xiaoqu', 'xueli', 'nianji', 'addtime', 'login_time', 'name', 'pingjun', 'jiguan', 'pingkun', 'liuxiao', 'yingyu', 'gaozhongzk', 'zuanye', 'yuyan', 'phone', 'qq', 'msn', 'jinneng', 'pimg', 'type', 'jiaoshoukc', 'jiaoshoudq', 'time1', 'time2', 'gk_zong', 'gk_yuwen', 'gk_sushu', 'gk_yingyu', 'gk_zonghe', 'jy_sushu', 'jy_yingyu', 'jy_qita', 'jy_zong', 'jj_duixiang', 'jj_shixing', 'jj_dizhi', 'jj_jingyan', 'zhenshu', 'jieshao', 'beizu', 'time', 'a1', 'a2', 'a3', 'a4', 'a5', 'a6', 'a7', 'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'content', 'xueyuan', 'graduation_time'], 'required'],
            [['login_time', 'graduation_time'], 'integer'],
            [['jiaoshoukc', 'jj_jingyan', 'zhenshu', 'jieshao', 'beizu', 'content'], 'string'],
            [['username', 'password', 'email', 'xingbie', 'xingge', 'sanchang', 'xuexiao', 'xiaoqu', 'xueli', 'nianji', 'addtime', 'name', 'pingjun', 'jiguan', 'pingkun', 'liuxiao', 'yingyu', 'gaozhongzk', 'zuanye', 'phone', 'qq', 'msn', 'jinneng', 'pimg', 'type', 'jiaoshoudq', 'time1', 'time2', 'gk_zong', 'gk_yuwen', 'gk_sushu', 'gk_yingyu', 'gk_zonghe', 'jy_sushu', 'jy_yingyu', 'jy_qita', 'jy_zong', 'jj_duixiang', 'jj_shixing', 'jj_dizhi', 'time', 'xueyuan'], 'string', 'max' => 100],
            [['yuyan'], 'string', 'max' => 255],
            [['a1'], 'string', 'max' => 10],
            [['a2', 'a3', 'a4', 'a5', 'a6', 'a7', 'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'xingbie' => 'Xingbie',
            'xingge' => 'Xingge',
            'sanchang' => 'Sanchang',
            'xuexiao' => 'Xuexiao',
            'xiaoqu' => 'Xiaoqu',
            'xueli' => 'Xueli',
            'nianji' => 'Nianji',
            'addtime' => 'Addtime',
            'login_time' => 'Login Time',
            'name' => 'Name',
            'pingjun' => 'Pingjun',
            'jiguan' => 'Jiguan',
            'pingkun' => 'Pingkun',
            'liuxiao' => 'Liuxiao',
            'yingyu' => 'Yingyu',
            'gaozhongzk' => 'Gaozhongzk',
            'zuanye' => 'Zuanye',
            'yuyan' => 'Yuyan',
            'phone' => 'Phone',
            'qq' => 'Qq',
            'msn' => 'Msn',
            'jinneng' => 'Jinneng',
            'pimg' => 'Pimg',
            'type' => 'Type',
            'jiaoshoukc' => 'Jiaoshoukc',
            'jiaoshoudq' => 'Jiaoshoudq',
            'time1' => 'Time1',
            'time2' => 'Time2',
            'gk_zong' => 'Gk Zong',
            'gk_yuwen' => 'Gk Yuwen',
            'gk_sushu' => 'Gk Sushu',
            'gk_yingyu' => 'Gk Yingyu',
            'gk_zonghe' => 'Gk Zonghe',
            'jy_sushu' => 'Jy Sushu',
            'jy_yingyu' => 'Jy Yingyu',
            'jy_qita' => 'Jy Qita',
            'jy_zong' => 'Jy Zong',
            'jj_duixiang' => 'Jj Duixiang',
            'jj_shixing' => 'Jj Shixing',
            'jj_dizhi' => 'Jj Dizhi',
            'jj_jingyan' => 'Jj Jingyan',
            'zhenshu' => 'Zhenshu',
            'jieshao' => 'Jieshao',
            'beizu' => 'Beizu',
            'time' => 'Time',
            'a1' => 'A1',
            'a2' => 'A2',
            'a3' => 'A3',
            'a4' => 'A4',
            'a5' => 'A5',
            'a6' => 'A6',
            'a7' => 'A7',
            'b1' => 'B1',
            'b2' => 'B2',
            'b3' => 'B3',
            'b4' => 'B4',
            'b5' => 'B5',
            'b6' => 'B6',
            'b7' => 'B7',
            'c1' => 'C1',
            'c2' => 'C2',
            'c3' => 'C3',
            'c4' => 'C4',
            'c5' => 'C5',
            'c6' => 'C6',
            'c7' => 'C7',
            'content' => 'Content',
            'xueyuan' => 'Xueyuan',
            'graduation_time' => 'Graduation Time',
        ];
    }
}

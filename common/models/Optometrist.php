<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "optometrist".
 *
 * @property integer $id
 * @property integer $pacient_id
 * @property string $dodsph
 * @property string $dodcyl
 * @property string $dodax
 * @property string $dossph
 * @property string $doscyl
 * @property string $dosax
 * @property string $dpd
 * @property string $dstakla
 * @property string $dokvir
 * @property string $bodsph
 * @property string $bodcyl
 * @property string $bodax
 * @property string $bossph
 * @property string $boscyl
 * @property string $bosax
 * @property string $bpd
 * @property string $bstakla
 * @property string $bokvir
 * @property integer $predio
 * @property string $vod
 * @property string $vos
 * @property string $note
 * @property string $personal_note
 * @property integer $created_at
 */
class Optometrist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optometrist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pacient_id', 'created_at','predio'], 'required'],
            [['pacient_id', 'predio'], 'integer'],
            [['dstakla', 'dokvir', 'bstakla', 'bokvir', 'note', 'personal_note'], 'string'],
            [['dodsph', 'dodcyl', 'dodax', 'dossph', 'doscyl', 'dosax', 'dpd', 'bodsph', 'bodcyl', 'bodax', 'bossph', 'boscyl', 'bosax', 'bpd'], 'string', 'max' => 6],
            [['vod', 'vos'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pacient_id' => 'Pacient',
            'dodsph' => 'Dodsph',
            'dodcyl' => 'Dodcyl',
            'dodax' => 'Dodax',
            'dossph' => 'Dossph',
            'doscyl' => 'Doscyl',
            'dosax' => 'Dosax',
            'dpd' => 'Dpd',
            'dstakla' => 'Dstakla',
            'dokvir' => 'Dokvir',
            'bodsph' => 'Bodsph',
            'bodcyl' => 'Bodcyl',
            'bodax' => 'Bodax',
            'bossph' => 'Bossph',
            'boscyl' => 'Boscyl',
            'bosax' => 'Bosax',
            'bpd' => 'Bpd',
            'bstakla' => 'Bstakla',
            'bokvir' => 'Bokvir',
            'predio' => 'Predio',
            'vod' => 'Vod',
            'vos' => 'Vos',
            'note' => 'Note',
            'personal_note' => 'Personal Note',
            'created_at' => 'Created At',
        ];
    }

    /*
     * Relations
     */

    public function getPacient(){
        return $this->hasOne(Pacient::className(),['id'=>'pacient_id']);
    }
}

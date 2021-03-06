<?php
namespace app\models;
use Yii;
class SiteCountShowFile extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'SITE_COUNT_SHOW_FILE';
    }
    public static function getDb()
    {
        return Yii::$app->get('dbPulsar');
    }
    public function rules()
    {
        return [
            [['INT_FK_SITE_FILE_ID'], 'required'],
            [['INT_FK_SITE_FILE_ID', 'INT_COUNT_SHOW_FILE'], 'integer'],
            [['INT_FK_SITE_FILE_ID'], 'unique'],
            [['INT_FK_SITE_FILE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => SiteFile::className(), 'targetAttribute' => ['INT_FK_SITE_FILE_ID' => 'INT_PK_ID_SITE_FILE']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'INT_FK_SITE_FILE_ID' => Yii::t('erpModel', 'Int  Fk  Site  File  ID'),
            'INT_COUNT_SHOW_FILE' => Yii::t('erpModel', 'ANTIGA: log_count_view'),
        ];
    }
    public function getIntFkSiteFile()
    {
        return $this->hasOne(SiteFile::className(), ['INT_PK_ID_SITE_FILE' => 'INT_FK_SITE_FILE_ID']);
    }
}
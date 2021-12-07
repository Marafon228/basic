<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $timestamp
 * @property int $idUser
 * @property int $IdCaregory
 * @property string $status
 * @property string|null $photoBefore
 * @property string|null $photoAfter
 *
 * @property Category $idCaregory
 * @property User $idUser0
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'idUser', 'IdCaregory'], 'required'],
            [['description', 'status'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'IdCaregory'], 'integer'],
            [['name', 'photoBefore', 'photoAfter'], 'string', 'max' => 255],
            [['IdCaregory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['IdCaregory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
            'idUser' => 'Id User',
            'IdCaregory' => 'Id Caregory',
            'status' => 'Status',
            'photoBefore' => 'Photo Before',
            'photoAfter' => 'Photo After',
        ];
    }

    /**
     * Gets query for [[IdCaregory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaregory()
    {
        return $this->hasOne(Category::className(), ['id' => 'IdCaregory']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}

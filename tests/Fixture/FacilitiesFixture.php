<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacilitiesFixture
 */
class FacilitiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pg_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'furnishing' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '1-furnished 2-semiFurnished 3-unFurnished', 'precision' => null],
        'balcony' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'chair' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'sofa' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'electricity' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'powerBackup' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'wifi' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'led' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'refrigerator' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'AC' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'RO' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'geaser' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'cooler' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'laundary' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'security' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'cctv' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'parking' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'pg_id' => ['type' => 'index', 'columns' => ['pg_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'facilities_ibfk_1' => ['type' => 'foreign', 'columns' => ['pg_id'], 'references' => ['pgs', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'pg_id' => 1,
                'furnishing' => 'Lorem ipsum dolor sit amet',
                'balcony' => 'Lorem ipsum dolor sit amet',
                'chair' => 'Lorem ipsum dolor sit amet',
                'sofa' => 'Lorem ipsum dolor sit amet',
                'electricity' => 'Lorem ipsum dolor sit amet',
                'powerBackup' => 'Lorem ipsum dolor sit amet',
                'wifi' => 'Lorem ipsum dolor sit amet',
                'led' => 'Lorem ipsum dolor sit amet',
                'refrigerator' => 'Lorem ipsum dolor sit amet',
                'AC' => 'Lorem ipsum dolor sit amet',
                'RO' => 'Lorem ipsum dolor sit amet',
                'geaser' => 'Lorem ipsum dolor sit amet',
                'cooler' => 'Lorem ipsum dolor sit amet',
                'laundary' => 'Lorem ipsum dolor sit amet',
                'security' => 'Lorem ipsum dolor sit amet',
                'cctv' => 'Lorem ipsum dolor sit amet',
                'parking' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

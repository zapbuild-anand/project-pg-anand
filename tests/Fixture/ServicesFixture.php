<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServicesFixture
 */
class ServicesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pricing_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'food' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'laundary' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'electricity' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'wifi' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'housekeeping' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'dth' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => '0', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'pricing_id' => ['type' => 'index', 'columns' => ['pricing_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'services_ibfk_1' => ['type' => 'foreign', 'columns' => ['pricing_id'], 'references' => ['pricings', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'pricing_id' => 1,
                'food' => 'Lorem ipsum dolor sit amet',
                'laundary' => 'Lorem ipsum dolor sit amet',
                'electricity' => 'Lorem ipsum dolor sit amet',
                'wifi' => 'Lorem ipsum dolor sit amet',
                'housekeeping' => 'Lorem ipsum dolor sit amet',
                'dth' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

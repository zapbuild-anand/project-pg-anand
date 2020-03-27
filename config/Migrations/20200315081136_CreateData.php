<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateData extends AbstractMigration
{
    public function change()
    {
        
        $this->table('addresses')
        ->addColumn('user_id','integer',['null'=>true,])
        ->addColumn('pg_id','integer',['null'=>true,])
        ->addColumn('state','string',['null'=>false,])
        ->addColumn('district','string',['null'=>false,])
        ->addColumn('sector','string',['null'=>false,])
        ->addColumn('pincode','integer',['null'=>false,])
        ->create();

        $this->table('users')
        ->addColumn('firstname','string',['limit'=>'50','null'=>false,])
        ->addColumn('lastname','string',['limit'=>'50','null'=>false,])
        ->addColumn('password','string',['limit'=>'255','null'=>false,])
        ->addColumn('email','string',['limit'=>'50','null'=>false,])
        ->addColumn('phone','string',['limit'=>'12','null'=>false,])
        ->addColumn('gender','enum',[
            'values'=>['1','2','3'],
            'comment'=>'1-male 2-female 3-others',
            'null'=>false,
        ])
        ->addColumn('dob','date',['null'=>true,])
        ->addColumn('image','string',['limit'=>'50','null'=>true,])
        ->addColumn('type','enum',[
            'values'=>['1','2','3'],
            'comment'=>'1-guest 2-owner 3-admin',
            'default'=>'1',
            'null'=>false,
        ])
        ->addColumn('created','datetime',['null'=>false,])
        ->addColumn('modified','datetime',['null'=>false,])
        ->create();


        $this->table('pgs')
        ->addColumn('name','string',['limit'=>'100','null'=>false,])
        ->addColumn('user_id','integer',['null'=>false,])
        ->addColumn('type','enum',[
            'values'=>['1','2','3'],
            'comment'=>'1-boys 2-girls 3-all',
            'default'=>'1',
            'null'=>false,
        ])
        ->addColumn('sharing','integer',['limit'=>'1','comment'=>'1-private 2,3,4,5-shared','null'=>false,])
        ->addColumn('totalFloors','integer',['limit'=>'1','null'=>false,])
        ->addColumn('pgOnFloor','integer',['limit'=>'1','null'=>false,])
        ->addColumn('noOfRooms','integer',['limit'=>'1','null'=>false,])
        ->addColumn('houseNumber','integer',['null'=>false,])
        ->addColumn('landmark','string',['limit'=>'50','null'=>false,])
        ->addColumn('availableFrom','date',['null'=>false,])
        ->addColumn('status','enum',[
            'values'=>['1','0'],
            'comment'=>'1-available 0-not available',
            'default'=>'1',
            'null'=>false,
        ])
        ->addColumn('approved','enum',[
            'values'=>['1','0'],
            'comment'=>'1-approved 0-not approved',
            'default'=>'0',
            'null'=>false,
        ])
        ->addColumn('expire','datetime',['null'=>true,])
        ->addColumn('created','datetime',['null'=>false,])
        ->addColumn('modified','datetime',['null'=>false,])
        ->create();

        $this->table('images')
        ->addColumn('pg_id','integer',['null'=>false,])
        ->addColumn('image','string',['limit'=>'50','null'=>true,])
        ->create();

        $this->table('facilities')
        ->addColumn('pg_id','integer',['null'=>false,])
        ->addColumn('furnishing','enum',[
            'values'=>['1','2','3'],
            'comment'=>'1-furnished 2-semiFurnished 3-unFurnished',
            'null'=>false,
        ])
        ->addColumn('balcony','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('table','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('sofa','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('electricity','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('powerBackup','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('wifi','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('led','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('refrigerator','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('AC','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('RO','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('geaser','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('cooler','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('laundary','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('security','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('cctv','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('parking','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->create();


        $this->table('meals')
        ->addColumn('facility_id','integer',['null'=>'true'])
        ->addColumn('breakfast','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('lunch','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('dinner','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->create();


        $this->table('pricings')
        ->addColumn('pg_id','integer',['null'=>false,])
        ->addColumn('rent','integer',['null'=>false,])
        ->addColumn('security','integer',['null'=>false,])
        ->addColumn('minimumDuration','integer',['comment'=>'in months','limit'=>'1','null'=>false,])
        ->addColumn('leavingNotice','integer',['comment'=>'in months','limit'=>'1','null'=>false,])
        ->addColumn('earlyLeavingCharge','integer',['null'=>false,])
        ->addColumn('food','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('laundary','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('electricity','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('wifi','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('housekeeping','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('dth','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->create();

        $this->table('rules')
        ->addColumn('pg_id','integer',['null'=>false])
        ->addColumn('pets','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('visitors','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('smoking','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('alcohal','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('events','enum',['values'=>['1','0'],'default'=>'0','null'=>false,])
        ->addColumn('lateEntry','time',['null'=>true,])
        ->addColumn('others','text',['null'=>true])
        ->create();

        
        $this->table('ratings')
        ->addColumn('user_id','integer',['null'=>false,])
        ->addColumn('pg_id','integer',['null'=>false,])
        ->addColumn('rating','integer',['limit'=>'1','null'=>false,])
        ->addColumn('comment','text',['null'=>false,])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();

        $this->table('feedbacks')
        ->addColumn('name','string',['limit'=>'50','null'=>false,])
        ->addColumn('email','string',['limit'=>'50','null'=>false,])
        ->addColumn('phone','string',['limit'=>'12','null'=>false,])
        ->addColumn('overall','enum',[
            'values'=>['1','2','3','4','5'],
            'comment'=>'1-bad 2-good 3-very good 4-average 5-excellent',
            'null'=>false,
        ])
        ->addColumn('designing','enum',[
            'values'=>['1','2','3','4','5'],
            'comment'=>'1-bad 2-good 3-very good 4-average 5-excellent',
            'null'=>false,
        ])
        ->addColumn('website','enum',[
            'values'=>['1','2','3','4','5'],
            'comment'=>'1-bad 2-good 3-very good 4-average 5-excellent',
            'null'=>false,
        ])
        ->addColumn('userFriendly','enum',[
            'values'=>['1','2'],
            'comment'=>'1-yes 2-no',
            'null'=>false,
        ])
        ->addColumn('comment','text',['null'=>false,])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();

        $this->table('requests')
        ->addColumn('pg_id','integer',['null'=>false,])
        ->addColumn('user_id','integer',['null'=>false,])
        ->addColumn('status','enum',[
            'values'=>['1','0'],
            'comment'=>'1-accepted 0-pending',
            'default'=>'0',
            'null'=>false,
        ])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();

        $this->table('bookings')
        ->addColumn('request_id','integer',['null'=>false,])
        ->addColumn('status','enum',[
            'values'=>['1','0'],
            'comment'=>'1-confirmed 0-due',
            'default'=>'0',
            'null'=>false,
        ])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();
    
        $this->table('bills')
        ->addColumn('booking_id','integer',['null'=>false,])
        ->addColumn('rents','integer',['null'=>false,])
        ->addColumn('advance','integer',['null'=>'true'])
        ->addColumn('security','integer',['null'=>'true'])
        ->addColumn('total','integer',['null'=>false,])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();


        $this->table('payments')
        ->addColumn('bill_id','integer',['null'=>false,])
        ->addColumn('mode','enum',[
            'values'=>['1','2','3','4'],
            'comment'=>'1-debitCard 2-creaditCard 3-netBanking 4-UPI',
            'default'=>'1',
            'null'=>false,
        ])
        ->addColumn('status','enum',[
            'values'=>['1','0'],
            'comment'=>'1-paid 0-due',
            'default'=>'0','null'=>false,
        ])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();

        $this->table('bookedpgs')
        ->addColumn('payment_id','integer',['null'=>false,])
        ->addColumn('status','enum',[
            'comment'=>'1-booked 0-not booked',
            'values'=>['1','0'],
            'default'=>'0',
            'null'=>false,])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();

        $this->table('rents')
        ->addColumn('bookedpg_id','integer',['null'=>false,])
        ->addColumn('amount','integer',['null'=>false,])
        ->addColumn('from','datetime',['null'=>false,])
        ->addColumn('to','datetime',['null'=>false,])
        ->addColumn('status','enum',[
            'values'=>['1','0'],
            'comment'=>'1-paid 0-due',
            'default'=>'0','null'=>false,
        ])
        ->addColumn('created','datetime',['null'=>false,])
        ->create();

        $this->table('categories')
        ->addColumn('name','string',['limit'=>'50','null'=>false,])
        ->addColumn('parent_id','integer',['null'=>true,])
        ->create();



        $this->table('addresses')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('addresses')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        
        $this->table('pgs')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('facilities')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('images')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('meals')
            ->addForeignKey(
                'facility_id',
                'facilities',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('ratings')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('ratings')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('requests')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('requests')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('bookings')
            ->addForeignKey(
                'request_id',
                'requests',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('bills')
            ->addForeignKey(
                'booking_id',
                'bookings',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('payments')
            ->addForeignKey(
                'bill_id',
                'bills',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('bookedpgs')
            ->addForeignKey(
                'payment_id',
                'payments',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('rents')
            ->addForeignKey(
                'bookedpg_id',
                'bookedpgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('pricings')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
        $this->table('rules')
            ->addForeignKey(
                'pg_id',
                'pgs',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
    }
}

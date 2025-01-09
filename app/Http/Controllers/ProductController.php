<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //เป็นอาเรย์ที่เก็บข้อมูลของสินค้าทั้งหมด มี ชื่อสินค้า รายละเอียดสินค้า ราคา และ ลิ้งค์ภาพสินค้า 
    private $products = [
        ['id' => 1, 'name' => 'Jack Daniel’s Old ',
        'description' => 'Jack Daniel’s Old No. 7 1L เป็นวิสกี้แบรนด์ชื่อดังจากสหรัฐอเมริกา ซึ่งมีชื่อเสียงในหมู่นักดื่มวิสกี้ทั่วโลก โดยมีลักษณะพิเศษคือการกรองผ่านถ่านไม้เมเปิ้ล (Charcoal Mellowing) ที่ทำให้รสชาติของวิสกี้มีความนุ่มนวลและสมดุล ',
         'price' => '45', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_dab2483b0c2e456d8c7cdc1bc5d8b699mv2.jpg'],

        ['id' => 2, 'name' => 'Beehive VSOP ',
         'description' => 'Beehive VSOP 700 ml เป็นบรั่นดีที่มีคุณภาพสูงจากประเทศฝรั่งเศส ซึ่งเป็นหนึ่งในประเภท VSOP (Very Superior Old Pale) ที่หมายถึงบรั่นดีที่ได้รับการบ่มในถังไม้โอ๊กเป็นระยะเวลาอย่างน้อย 4 ปี ทำให้มีรสชาติที่ลึกซึ้งและมีความนุ่มนวล บรั่นดีตัวนี้มักจะมีรสชาติที่กลมกล่อมและสมดุล',
         'price' => '60', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_4889715bb5c54b5fa57c7872a4eb1ab1mv2.jpg'],

        ['id' => 3, 'name' => 'Aberlour 10Y ',
         'description' => 'Aberlour 10 Year Old เป็นสก็อตช์วิสกี้ที่ผลิตจากโรงกลั่น Aberlour ซึ่งตั้งอยู่ในสก็อตแลนด์ โดยเป็นวิสกี้ประเภท Speyside ซึ่งมีชื่อเสียงในเรื่องของรสชาติที่ซับซ้อนและนุ่มนวล สร้างจากการผสมผสานระหว่างวิสกี้ที่บ่มในถังไม้โอ๊กธรรมดาและถังที่เคยใช้บ่มเชอร์รี่ที่ให้รสชาติที่หวานและกลมกล่อม',
         'price' => '50', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_d5e7e65f1c1d4cecb966f535340ecc38mv2.jpg'],

         ['id' => 4, 'name' => 'Absenthe Gogh Edition',
         'description' => 'Absenthe Gogh Edition เป็นแอบแซนท์ (Absinthe) ที่มีการออกแบบขวดและการบรรจุที่โดดเด่น โดยมีการนำเสนอในรุ่นพิเศษที่เรียกว่า Gogh Edition ซึ่งมีความเกี่ยวข้องกับศิลปินชื่อดัง Vincent van Gogh ซึ่งเป็นที่รู้จักกันดีในการสร้างสรรค์ผลงานที่เต็มไปด้วยความสร้างสรรค์และมีชีวิตชีวา',
         'price' => '100', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_0dda3b7936cf4d80ba7dc36a72229f17mv2.jpg'],

         ['id' => 5, 'name' => 'Armand De Brignac Blanc De Blancs ',
         'description' => 'Armand de Brignac Blanc de Blancs เป็นแชมเปญระดับหรูจาก Armand de Brignac ซึ่งเป็นแบรนด์แชมเปญที่ได้รับการยอมรับในระดับโลกจากความหรูหราและคุณภาพสูง โดยเฉพาะรุ่น Blanc de Blancs ซึ่งทำจากองุ่นพันธุ์ Chardonnay 100% ทำให้แชมเปญนี้มีรสชาติที่เบาและสดชื่น',
         'price' => '500', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_ede9d9a006bf46cd980c98eb495d958amv2-scaled.jpg'],

         ['id' => 6, 'name' => 'Armand de Brignac Gold 12.5%',
         'description' => 'Armand de Brignac Gold เป็นแชมเปญระดับหรูจากแบรนด์ Armand de Brignac ซึ่งได้รับความนิยมจากทั้งในวงการของนักดื่มแชมเปญและผู้ชื่นชอบสินค้าหรูหรา โดย Armand de Brignac Gold มักถูกเรียกว่า "Ace of Spades" เนื่องจากโลโก้ของแบรนด์ที่มีรูปหน้าไพ่ชุดโพดำ (spades) และตัว "Ace" เป็นสัญลักษณ์ของความพรีเมียม',
         'price' => '600', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_39fcf78b1ae844c982b6f647de751217mv2.jpg'],

         ['id' => 7, 'name' => 'Auchentoshan 12Y',
         'description' => 'Auchentoshan 12 Year Old เป็น Single Malt Scotch Whisky ที่ผลิตจากโรงกลั่น Auchentoshan ในเขต Lowland ของสก็อตแลนด์ ซึ่งเป็นหนึ่งในโรงกลั่นที่มีชื่อเสียงในการผลิตวิสกี้แบบ Triple Cask, หรือการบ่มใน 3 ถังที่ต่างกัน',
         'price' => '45', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_9bacbc825d90415696416b7b861c62c4mv2.jpg'],

         ['id' => 8, 'name' => 'Babich Pinot Noir Rose',
         'description' => 'Babich Pinot Noir Rosé เป็นไวน์โรเซ่ที่ผลิตจากองุ่นพันธุ์ Pinot Noir โดย Babich Wines, โรงกลั่นไวน์ที่ตั้งอยู่ใน มาร์ลโบโรห์ (Marlborough) ประเทศนิวซีแลนด์ ซึ่งเป็นหนึ่งในพื้นที่ที่มีชื่อเสียงในการผลิตไวน์คุณภาพสูง โดยไวน์โรเซ่จาก Pinot Noir นี้มักจะมีความสดชื่นและรสชาติที่น่าดื่ม',
         'price' => '25', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_f45bca9e31134defb91a336e8e2b5ba2mv2.jpg'],

         ['id' => 9, 'name' => 'Ballantine Finest 1L',
         'description' => 'Ballantine’s Finest เป็นสก็อตช์วิสกี้เบลนด์ (Blended Scotch Whisky) ที่ได้รับความนิยมอย่างกว้างขวางจากแบรนด์ Ballantine’s ซึ่งมีชื่อเสียงในการผลิตวิสกี้ที่มีคุณภาพและราคาไม่สูงมากนัก แต่ยังคงมีรสชาติที่นุ่มนวลและกลมกล่อม',
         'price' => '35', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_e0d49bb35cba44a6b1453ca103ffb2a0mv2.jpg'],

         ['id' => 10, 'name' => 'Ballantine’s 15Y Glenburgie',
         'description' => 'Ballantine’s 15 Year Old Glenburgie เป็นวิสกี้ Blended Scotch ระดับพรีเมียมจากแบรนด์ Ballantine ซึ่งใช้วิสกี้ที่บ่มจากโรงกลั่น Glenburgie เป็นส่วนผสมหลักในสูตรการผลิต โดย Glenburgie เป็นโรงกลั่นที่ตั้งอยู่ในเขต Speyside ของสก็อตแลนด์และมีชื่อเสียงในเรื่องของการผลิตวิสกี้ที่มีรสชาติกลมกล่อมและซับซ้อน',
         'price' => '70', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_f6b9ec5296084095a138904872f5235amv2.jpg'],

         ['id' => 11, 'name' => 'Balvenie 12Y American Oak',
         'description' => 'Balvenie 12 Year Old American Oak เป็นวิสกี้ Single Malt Scotch จาก Balvenie Distillery ซึ่งตั้งอยู่ในเขต Speyside ของสก็อตแลนด์ โดยวิสกี้รุ่นนี้ได้รับการบ่มในถังไม้โอ๊กที่เคยใช้สำหรับบ่ม Bourbon จากสหรัฐอเมริกา (American Oak), ซึ่งช่วยเพิ่มรสชาติที่มีความหวานและกลิ่นหอมของวานิลลาและผลไม้',
         'price' => '75', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_d1d37c1e45e447e79b5a7712c3f14760mv2.jpg'],

         ['id' => 12, 'name' => 'Baron Otard Vsop (1L)',
         'description' => 'Baron Otard VSOP เป็น Cognac จากแบรนด์ Baron Otard ซึ่งมีชื่อเสียงในด้านการผลิตคอนญักที่มีคุณภาพสูง โดย VSOP หมายถึง Very Superior Old Pale ซึ่งเป็นการบ่งบอกถึงอายุเฉลี่ยของคอนญักที่มีการบ่มไม่น้อยกว่า 4 ปี',
         'price' => '70', 'image' => 'https://finewinebkk.com/wp-content/uploads/2023/12/3755d2_862f9b44effe4d18b120b4d448a8f083mv2.jpg'],
     ];

    public function index()  //ฟังก์ชันตัวนี้จะส่งข้อมูลสินค้า $product ไปยังหน้าจอ Products/Index
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)  //ฟังก์ชันนี้จะแสดงรายละเอียดสินค้าตาม id ที่ส่งมา แต่ถ้าหากไม่พบสินค้าจะคืนค่าเป็น 404
    {
        $product = collect($this->products)->firstWhere('id', $id);
        // หากไม่เจอสินค้าให้โชว์ ไม่พบสินค้า
        if (!$product) {
            abort(404, 'Product not found');
        }
        return Inertia::render('Products/Show', ['product' => $product]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}

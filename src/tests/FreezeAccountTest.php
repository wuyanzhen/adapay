<?phpuse PHPUnit\Framework\TestCase;class FreezeAccountTest extends TestCase{    public function testCreate()    {        $adaPay = new AdaPay\AdaPay();        $adaPay->gateWayType = 'api';        # 初始化冻结账户对象类        $obj = new \AdaPaySdk\FreezeAccount();        $fz_params = array(            'app_id'=> 'app_7d87c043-aae3-4357-9b2c-269349a980d6',            'order_no'=> 'FZ_'. date("YmdHis").rand(100000, 999999),            'trans_amt'=> '0.10',            'member_id'=> 'member_id_test'        );        # 创建账户冻结对象        $obj->create($fz_params);        print("创建解冻支付对象".$obj->isError().'=>'.json_encode($obj->result)."\n");        $this->assertTrue($obj->isError());    }    public function testList()    {        $adaPay = new AdaPay\AdaPay();        $adaPay->gateWayType = 'api';        $obj = new \AdaPaySdk\FreezeAccount();        $fz_params = array(            'app_id'=> 'app_7d87c043-aae3-4357-9b2c-269349a980d6',            'order_no'=> 'FZ_'. date("YmdHis").rand(100000, 999999),            'status'=> 'succeeded', //succeeded-成功，failed-失败，pending-处理中            'page_index'=> 1,            'page_size'=> 1,            'created_gte'=> '',            'created_lte'=> ''        );# 查询账户冻结对象        $obj->queryList($fz_params);        print("创建解冻支付对象".$obj->isError().'=>'.json_encode($obj->result)."\n");        $this->assertTrue($obj->isError());    }}
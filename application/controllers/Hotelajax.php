<?php

/**
 * @author ZXM
 */
class HotelajaxController extends \BaseController {

    /**
     * @var HotelModel
     */
    private $hotelModal;

    /**
     * @var Convertor_Hotel
     */
    private $hotelConvertor;

    public function init() {
        parent::init();
        $this->hotelModal = new HotelModel();
        $this->hotelConvertor = new Convertor_Hotel();
    }

    public function getHotelListAction() {
        $paramList['id'] = intval($this->getPost('id'));
        $paramList['name'] = $this->getPost('name');
        $paramList['groupid'] = intval($this->getPost('groupid'));
        $status = $this->getPost('status');
        $status !== 'all' && !is_null($status) ? $paramList['status'] = intval($status) : false;
        $result = $this->hotelModal->getHotelList($paramList);
        $result = $this->hotelConvertor->hotelListConvertor($result);
        $this->echoJson($result);
    }

}

<?php

namespace im\Tencent\UserPush;

use GuzzleHttp\Exception\GuzzleException;
use im\Kernel\Support\Arr;
use im\Tencent\Request\TencentClient;

/**
 * Class TagClient
 * @author laoqianjunzi
 * @package im\Tencent\UserPush
 */
class TagClient extends TencentClient
{
    /**
     * 获取用户标签
     * https://cloud.tencent.com/document/product/269/45940.
     *
     * @param $userId
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function query($userId)
    {
        $params = Arr::buildItem($userId, 'To_Account');

        return $this->send('all_member_push/im_get_tag', $params);
    }

    /**
     * 添加用户标签
     * https://cloud.tencent.com/document/product/269/45941.
     *
     * @param $params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function officialSet($params)
    {
        return $this->send('all_member_push/im_add_tag', $params);
    }

    /**
     * 删除用户标签
     * https://cloud.tencent.com/document/product/269/45942.
     *
     * @param $params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function officialDelete($params)
    {
        return $this->send('all_member_push/im_remove_tag', $params);
    }

    /**
     * 删除用户所有标签
     * https://cloud.tencent.com/document/product/269/45943.
     *
     * @param $userId
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function allDelete($userId)
    {
        $params = Arr::buildItem($userId, 'To_Account');

        return $this->send('all_member_push/im_remove_all_tags', $params);
    }
}

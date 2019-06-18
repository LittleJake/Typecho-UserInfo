<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 
 头像挂件widget
 *
 * @package UserInfo
 * @author  LittleJake
 * @version 1.0.0
 * @link https://blog.littlejake.tk
 */
class UserInfo_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法
     *
     * @return void
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->beforeRender = array(
            'UserInfo_Plugin',
        );
            
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @access public
     * @return void
     */
    public static function deactivate(){}

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
		$display = new Typecho_Widget_Helper_Form_Element_Radio(
            'display',
            array('1' => _t('是'),
				'0' => _t('否')),
            '1',
            _t('是否显示')
        );
		
        $logo_url = new Typecho_Widget_Helper_Form_Element_Text(
            'logo_url',
            NULL,
            'https://',
            _t('头像地址')
        );
		
		$intro = new Typecho_Widget_Helper_Form_Element_Text(
            'intro',
            NULL,
            '',
            _t('自我介绍')
        );

        $form->addInput($logo_url);
        $form->addInput($intro);
        $form->addInput($display);
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 
     * 获取用户信息
	 *
     * @access public
     * @return array
     * @throws
     */
    public static function getUser()
    {
        $row['display'] = Typecho_Widget::widget('Widget_Options')
                    ->plugin('UserInfo')->display;
		$row['intro'] = Typecho_Widget::widget('Widget_Options')
                    ->plugin('UserInfo')->intro;
		$row['logo_url'] = Typecho_Widget::widget('Widget_Options')
                    ->plugin('UserInfo')->logo_url;

        return $row;
    }

   
}

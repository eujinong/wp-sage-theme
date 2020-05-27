<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
	public function home_page_about_content()
	{
		$home_about = get_field('home_about');
		
		$about_array = [
			'titles' => [$home_about['heading_1'], $home_about['heading_2'], $home_about['heading_3']],
			'content' => $home_about['subtitle']
		  ];				
				
		return $about_array;
	}
	
	public function home_page_image_block_content($block = 1)
	{
		$image_block_main = get_field('image_block');
		$image_block = $image_block_main['block_'.$block];
		
		$image_block_array = [
			'featured_image' => $image_block['image'],
			'title' => $image_block['title'],
			'subtitle' => $image_block['subtitle'],
			'content' => $image_block['body_text'],
			'action_title' => $image_block['link']['title'],
			'action_link' => home_url().$image_block['link']['url']
		  ];				
				
		return $image_block_array;
	}
	
	public function home_page_myQOL()
	{
		$myQOL = get_field('myqol');
		
		$myQOL_array = [
			'image' => $myQOL['image']['url'],
			'title' => $myQOL['title'],
			'content' => $myQOL['body_text'],
			'action_title1' => $myQOL['link_1']['title'],
			'action_link1' => home_url().$myQOL['link_1']['url'],
			'action_title2' => $myQOL['link_2']['title'],
			'action_link2' => $myQOL['link_2']['url']
		  ];				
				
		return $myQOL_array;
	}
	
	public function home_page_help()
	{
		$home_help = get_field('home_help');
		
		$home_help_array = [
			'image' => $home_help['image']['url'],
			'title' => $home_help['title'],
			'content' => $home_help['body_text'],
			'action_title' => $home_help['link']['title'],
			'action_link' => home_url().$home_help['link']['url']
		  ];				
				
		return $home_help_array;
	}
	
	public function home_page_products()
	{
		$return_arr = array();
		
		$product_main = get_field('products');
		
		for($i=1;$i<=count($product_main);$i++)
		{	
			$product = $product_main['product_'.$i];
			
			$product_sub_array = [
				'title' => $product['product_name'],
				'content' => $product['body_text'],
				'featured_image' => $product['product_image']['url'],
				'action_title' => $product['product_link']['title'],
				'action_link' => home_url().$product['product_link']['url']
			];
		    
			array_push($return_arr, (object)$product_sub_array);
			
		}		
		
		$data = ['data' => $return_arr];
		
		
		return $data;
	}
	
	public function home_page_slides()
	{
		$return_arr = array();
		
		$product_main = get_field('slides');
		
		for($i=1;$i<=count($product_main);$i++)
		{	
			$product = $product_main['slide_'.$i];
			
			$product_sub_array = [
				'title' => $product['title'],
				'content' => $product['subtitle'],
				'featured_image' => $product['image'],
				'action_title' => $product['link']['title'],
				'action_link' => home_url().esc_url($product['link']['url'])
			];
		    
			array_push($return_arr, (object)$product_sub_array);
			
		}		
		
		$data = ['data' => $return_arr, 'options' => ['class' => 'home-hero-block']];
		
		
		return $data;
	}
	
}
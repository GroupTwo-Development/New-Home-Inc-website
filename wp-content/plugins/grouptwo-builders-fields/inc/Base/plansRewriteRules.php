<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

//class plansRewriteRules extends BaseController{
//	public function register() {
////		add_action( 'generate_rewrite_rules', array($this, 'register_floorplan_rewrite_rules') );
////		add_filter( 'request', array($this, 'fix_floorplan_subcategory_query'), 10 );
////		add_filter( 'post_type_link', array($this, 'filter_floorplan_post_link'), 100, 3 );
////		add_filter( 'term_link', array($this, 'filter_floorplan_section_terms_link'), 100, 3 );
//	}
//
//
//	public  static function register_floorplan_rewrite_rules( $wp_rewrite ) {
//		$new_rules = array(
//			'floorplan/([^/]+)/?$' => 'index.php?floorplan-category=' . $wp_rewrite->preg_index( 1 ),
//			'floorplan/([^/]+)/([^/]+)/?$' => 'index.php?post_type=floorplan&floorplan-category=' . $wp_rewrite->preg_index( 1 ) . '&floorplan=' . $wp_rewrite->preg_index( 2 ),
//			'floorplan/([^/]+)/([^/]+)/page/(\d{1,})/?$' => 'index.php?post_type=floorplan&floorplan-category=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 3 ),
//			'floorplan/([^/]+)/([^/]+)/([^/]+)/?$' => 'index.php?post_type=floorplan&floorplan-category=' . $wp_rewrite->preg_index( 2 ) . '&floorplan=' . $wp_rewrite->preg_index( 3 ),
//		);
//
//		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
//	}
//
//	public static function fix_floorplan_subcategory_query($query){
//		if ( isset( $query['post_type'] ) && 'floorplan' == $query['post_type'] ) {
//			global $post;
//			if ( isset( $query['floorplan'] ) && $query['floorplan'] && isset( $query['floorplan-category'] ) && $query['floorplan-category'] ) {
//				$query_old = $query;
//				// Check if this is a paginated result(like search results)
//				if ( 'page' == $query['floorplan-category'] ) {
//					$query['paged'] = $query['name'];
//					unset( $query['floorplan-category'], $query['name'], $query['floorplan'] );
//				}
//				// Make it easier on the DB
//				$query['fields'] = 'ids';
//				$query['posts_per_page'] = 1;
//
//				// See if we have results or not
//				$_query = new \WP_Query( $query );
//				if ( ! $_query->posts ) {
//					$query = array( 'floorplan-category' => $query['floorplan'] );
//					if ( isset( $query_old['floorplan-category'] ) && 'page' == $query_old['floorplan-category'] ) {
//						$query['paged'] = $query_old['name'];
//					}
//				}
//			}
//		}
//		return $query;
//	}
//
//	public static function floorplan_article_permalink( $article_id, $section_id = false, $leavename = false, $only_permalink = false ) {
//		$taxonomy = 'floorplan-category';
//		$article = get_post( $article_id );
//
//		$return = '<a href="';
//		$permalink = ( $section_id ) ? trailingslashit( get_term_link( intval( $section_id ), 'floorplan-category' ) ) : home_url( '/floorplan/' );
//		$permalink .= trailingslashit( ( $leavename ? "%$article->post_type%" : $article->post_name ) );
//		$return .= $permalink . '/" >' . get_the_title( $article->ID ) . '</a>';
//		return ( $only_permalink ) ? $permalink : $return;
//	}
//
//	public static function filter_floorplan_post_link( $permalink, $post, $leavename ) {
//		if ( get_post_type( $post->ID ) == 'floorplan' ) {
//			$terms = wp_get_post_terms( $post->ID, 'floorplan-category' );
//			$term = ( $terms ) ? $terms[0]->term_id : false;
//			$permalink = self::floorplan_article_permalink( $post->ID, $term, $leavename, true );
//		}
//		return $permalink;
//	}
//
//	public static function filter_floorplan_section_terms_link( $termlink, $term, $taxonomy = false ) {
//		if ( $taxonomy == 'floorplan-category' ) {
//			$section_ancestors = get_ancestors( $term->term_id, $taxonomy );
//			krsort( $section_ancestors );
//			$termlink =  home_url( '/floorplan/' );
//			foreach ( $section_ancestors as $ancestor ) {
//				$section_ancestor = get_term( $ancestor, $taxonomy );
//				$termlink .= $section_ancestor->slug . '/';
//			}
//			$termlink .= trailingslashit( $term->slug );
////		var_dump($termlink);
//		}
//
//		return $termlink;
//	}
//
//
//
//
//
//}

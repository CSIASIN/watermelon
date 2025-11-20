<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Watermelon_Wordpress_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
<div class="ajax-filters">
	<form id="ajax-filter">
		<?php
			$categories = get_terms( // you can use get_categories() function as well
				array(
					// you can replace the taxonomy parameter value with any custom taxonomy name or 'post_tag'
					'taxonomy' => 'category',
					'orderby' => 'name',
				) 
			);
			if( $categories ) :
				?>
					<select id="mySelect">
						<option value="">Select category...</option>
						<?php
							foreach ( $categories as $category ) :
								?><option value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option><?php
							endforeach;
						?>
					</select>
				<?php
			endif;
		?>
	</form>
</div>

<div id="catData">


 <?php
                        $query = new WP_Query(
                                array(
                            'posts_per_page' => 5,
                            'cat' => 6,
                            'post_status' => 'publish',
                            'orderby' => 'rand',
                            'order' => 'ASC'
                                )
                        );
                        $i = 1;
                        if ($query->have_posts()) :
                            while ($query->have_posts()):$query->the_post();
							$excerpt = get_the_excerpt();
							//echo $excerpt;
			

                               // $hexCode = $hex = get_field("colorhex");
                              //  $hexH = "#" . $hex;
                                ?>
                                <h3 class="jumbotron-heading h4 mb-3"><a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>"> <?php echo get_the_title();?></a></h3>
                                <p class="font-weight-light text-muted border-bottom" >by <?php echo get_the_author() ;?> | Last Updated on <?php echo get_the_modified_date();?> | Created on <?php echo get_the_date();?></p>
                                <?php
                                $i++;
                            endwhile;
                            
                            wp_reset_postdata();
                        else:
                            echo "0";
                        endif;
                        ?>

</div>
	</main><!-- #main -->
<script>
	function loadScript(url, callback) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        if (script.readyState) {
            script.onreadystatechange = function() {
                if (script.readyState == "loaded" || script.readyState == "complete") {
                    script.onreadystatechange = null;
                    if (callback && typeof callback === "function") {
                        callback();
                    }
                }
            };
        } else {
            script.onload = function() {
                if (callback && typeof callback === "function") {
                    callback();
                }
            };
        }
        script.src = url;
        (document.getElementsByTagName('body')[0] || document.getElementsByTagName('head')[0]).appendChild(script);
    }

    loadScript(themeurl + "/js/jquery-3.6.0.min.js", function() {
		
		//  jQuery('#mySelect').on('change', function() {
    //var selectedValue = jQuery(this).val();
    //jQuery('#selectedFruit').text(selectedValue);
    //console.log("Selected value: " + selectedValue);
  //});

        var c=0;
        jQuery("#mySelect").on('change', function (e) {
			
			var selectedValue = jQuery(this).val();
           console.log("Selected value: " + selectedValue);
		   jQuery.ajax({// We use jQuery instead $ sign, because Wordpress convention.
                url: ajaxurl, // This addres will redirect the query to the functions.php file, where we coded the function that we need.
                type: 'POST',
                data: {
                    action: "ce_load_more_cat_posts",
                    catid:selectedValue
                },
                success: function (response) {
                    if(response=="noposts")
                    {
                        obj.hide();
                    }
                    else
                    {
                        jQuery("#catData").empty().append(response);
                        obj.text("Load more");
                    }
                    
                }
            });
        });

	
	
	});
		

</script>
<?php

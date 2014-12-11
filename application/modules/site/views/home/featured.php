 <div class="featured">
        <div class="content-title">
            <h2>Featured Properties</h2>
        </div>
        <div class="featured-carousel">
            <div class="featured-control">
                <a href="#" class="featured-prev"><i class="fa fa-angle-left"></i></a>
                <a href="#" class="featured-next"><i class="fa fa-angle-right"></i></a>
            </div>
            <div class="theme-owl-carousel">
                <div class="theme-owl-carousel-wrapper">
                    <div id="featured" class="owl-carousel">
                     <?php
                        if($featured->num_rows() > 0)
                        {
                            
                            $featured_properties = $featured->result();
                            
                            foreach($featured_properties as $feat)
                            {
                                $property_price = $feat->property_price;
                                $property_image = $feat->property_image;
                                $property_id = $feat->property_id;
                                $property_name = $feat->property_name;
                                $description = $feat->property_description;
                                $mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
                                $price = number_format($property_price, 0, '.', ',');
                                $location_name = $feat->location_name;
                                $property_size = $feat->property_size;
                                $land_size = $feat->land_size;
                                $lease_type_id = $feat->lease_type_id;
                                $property_type_name = $feat->property_type_name;
                                echo '
                                    <div class="thumbnail">
                                        <a href="#"><img src="'.base_url().'/assets/images/property/'.$property_image.'" class="img-responsive" alt=""/></a>

                                        <div class="caption">
                                            <h4>'.$property_name.'</h4>
                                            <ul class="list-inline">
                                                <li><i class="fa fa-location-arrow"></i>'.$location_name.', NY</li>
                                                <li><i class="fa fa-home"></i>'.$property_size.' sqft</li>
                                                <li><i class="fa fa-globe"></i>'.$land_size.' acres</li>
                                            </ul>
                                        </div>
                                    </div>
                                    ';
                            }
                        }
                        ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
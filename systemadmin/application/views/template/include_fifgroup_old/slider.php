<div class="mainSlider">
	<ul class="slider">

		<?php 

		 $this->db
                ->select('*');
        $this->db->order_by("sort", "asc");
        //$where = 'start_date <= now( ) and end_date >= now()';
        //$this->db->where($where);
        $this->db->limit(10);
        $this->db->from('sketsa_slidersfifgroup');
        $sliderQuery = $this->db->get('');

        //$slider = $sliderQuery->result_array();

        //echo count($slider);

		?>
		<?php foreach($sliderQuery->result_array() as $r): ?>
			 <?php if($r['url']!=''): ?>
    	

    		<li>
    		<a href="<?php echo $r['url']; ?>">
    		<img src="<?php echo base_url().'../uploads/sliderfifgroup/'.$r['image']; ?>" alt="Kredit Motor | Kredit Motor Honda | Kredit Elektronik | Kredit Motor Bekas | Kredit Motor Seken | Kredit Motor Second" />
    		</a></li>

    	<?php else: ?>

		<li>
    		
    		<img src="<?php echo base_url().'../uploads/sliderfifgroup/'.$r['image']; ?>" alt="Kredit Motor | Kredit Motor Honda | Kredit Elektronik | Kredit Motor Bekas | Kredit Motor Seken | Kredit Motor Second" />
    		</li>    		

    		<?php endif; ?>
		<?php endforeach; ?>
    </ul>
</div>
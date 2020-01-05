<td id="insidebar" class="insidebar">
    <?php if(time() % 2 == 0): ?>
    	<img style="border: 1px solid gray;" src="/foto/kosciol200.jpg" />
   <?php else: ?>
      <img style="border: 1px solid gray;" src="/foto/kosciol200_2.jpg" />
   <?php endif; ?>
   
   <br /><br />
    	
    <?php dynamic_sidebar( 'primary-widget-area' ); ?>
</td>

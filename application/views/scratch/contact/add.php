<div id="add">

  <?php
    echo validation_errors();

    echo form_open('contact/add');

      echo '<div id="add_contact">';
        echo form_label('Name', 'name');
        echo form_input('name',set_value('name'));

        echo form_label('Email', 'email');
        echo form_input('email',set_value('email'));

        echo form_label('Phone', 'phone');
        echo form_input('phone',set_value('phone'));
      echo '</div>';

	  $addressData = array(
	  		  'name'		=> 'address',
              'cols'        => '84'
            );

      echo '<div id="add_address">';
        echo form_label('Address', 'address');
        echo form_textarea($addressData);
      echo '</div>';

      echo '<div id="add_notes">';
        echo form_label('Notes', 'notes');
        echo form_textarea('notes',set_value('notes'));
      echo '</div>';

      echo form_submit('submit', 'Save', 'class="submit"');
      echo form_submit('submitmore', 'Save And Add Another', 'class="submit"');

    echo form_close();
  ?>

</div>

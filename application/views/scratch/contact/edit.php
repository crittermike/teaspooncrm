<div id="edit">

<?php

echo validation_errors();


  foreach ($contact as $contact) {

    echo form_open('contact/edit/' . $contact->id);
    echo '<div id="contact_info">';
      echo form_label('Name', 'name');
      echo form_input('name',$contact->name,'class="text name"');

      echo form_label('Email', 'email');
      echo form_input('email',$contact->email,'class="text email"');

      echo form_label('Phone', 'phone');
      echo form_input('phone',$contact->phone,'class="text phone"');

      echo form_label('Address', 'address');
      echo form_textarea('address',$contact->address,'class="text address"');
    echo '</div>';

    echo form_label('Notes', 'notes');
    echo form_textarea('notes',$contact->notes,'class="text notes"');

    echo form_submit('submit', 'Save Contact','class="button submit"');

  }

echo form_close();
?>

</div>

<div id="list">
  <?=anchor('contact/add','Add Contact','class="add"');?>
  <table class="contacts">
    <thead>
      <tr>
        <th class="name">Name</th>
        <th class="email">Email</th>
        <th class="phone">Phone</th>
        <th class="delete"><span>Delete</span></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($contacts as $contact): ?>
        <tr>
          <td class="name"><?=anchor('contact/edit/' . $contact->id, $contact->name);?></td>
          <td class="email"><?=$contact->email?></td>
          <td class="phone"><?=$contact->phone?></td>
          <td class="delete"><?=anchor('contact/delete/' . $contact->id, 'Delete', 'title="Delete This Contact"');?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

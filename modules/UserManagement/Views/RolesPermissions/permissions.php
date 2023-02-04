
<?php if (!empty($modules)): ?>
  <?php foreach ($modules as $module): ?>
    <?php foreach ($permission_types as $permission_type): ?>
      <?php foreach ($own_permissions as $permission): ?>
        <?php if ($permission['module_id'] == $module['module_id'] && $permission['permission_type_id'] == $permission_type['type_id']): ?>
          <span class="badge badge-dark-lighten"><?=ucwords(esc($permission['permission_name']))?></span>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
<?php else: ?>
  This role has no permissions.
<?php endif; ?>

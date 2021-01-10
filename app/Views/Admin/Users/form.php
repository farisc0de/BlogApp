  <div class="form-group">
      <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="<?= old('username', $user->username); ?>" />
  </div>

  <div class="form-group">
      <input class="form-control" placeholder="Email Address" type="email" name="email" id="email" value="<?= old('email', $user->email); ?>" />
  </div>

  <div class="form-group">
      <input class="form-control" placeholder="Password" type="password" name="password" id="password" value="" />
      <?php if ($user->id) : ?>
          <p class="help">Leave blank to keep existing password</p>
      <?php endif; ?>

  </div>

  <div class="form-group">
      <input class="form-control" placeholder="Password Confirmation" type="password" name="password_confirmation" id="password_confirmation" value="" />
  </div>

  <div class="form-check">
      <?php if ($user->id == current_user()->id) : ?>
          <input type="checkbox" class="form-check-input" id="is_active" value="1" disabled checked />
          <label class="form-check-label" for="is_active">
              Active
          </label>
      <?php else : ?>
          <input type="hidden" name="is_active" value="0" />
          <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" <?php if (old('is_active', $user->is_active)) : ?>checked<?php endif; ?> />
          <label class="form-check-label" for="is_active">
              Active
          </label>
      <?php endif; ?>
  </div>

  <div class="form-check">
      <?php if ($user->id == current_user()->id) : ?>
          <input type="checkbox" class="form-check-input" id="is_admin" value="1" disabled checked />
          <label class="form-check-label" for="is_admin">
              Administrator
          </label>
      <?php else : ?>
          <input type="hidden" name="is_admin" value="0" />
          <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" value="1" <?php if (old('is_admin', $user->is_admin)) : ?>checked<?php endif; ?> />
          <label class="form-check-label" for="is_admin">
              Administrator
          </label>
      <?php endif; ?>
  </div>
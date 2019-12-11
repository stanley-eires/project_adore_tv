<?php
    $paystack_settings = $this->db->get_where('settings', array('type' => 'paystack'))->row()->description;
    $paystack = json_decode($paystack_settings);
    $interswitch_settings = $this->db->get_where('settings', array('type' => 'interswitch'))->row()->description;
    $interswitch = json_decode($interswitch_settings);
?>
<div class="content row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h4><?= ('System Currency'); ?></h4>
        <form method="post" action="<?= base_url('admin/payment_settings/system_currency'); ?>">
          <div class="form-group">
            <label for="name">Select System Currency</label>
            <select class="form-control select2" id="source" name="system_currency" required>
              <option value=""><?= ('select_system_currency'); ?></option>
              <?php
                $currencies = $this->crud_model->get_currencies();
                foreach ($currencies as $currency):?>
                  <option value="<?= $currency['code'];?>"
                      <?php if ($this->crud_model->get_settings('system_currency') == $currency['code'])echo 'selected';?>> <?= $currency['code'];?>
                  </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="name">Select Currency Position</label>
            <select class="form-control select2" id="source" name="currency_position" data-init-plugin="select2" >
                <option value="left" <?php if ($this->crud_model->get_settings('currency_position') == 'left') echo 'selected';?> ><?= ('left'); ?></option>
                <option value="right" <?php if ($this->crud_model->get_settings('currency_position') == 'right') echo 'selected';?> ><?= ('right'); ?></option>
                <option value="left-space" <?php if ($this->crud_model->get_settings('currency_position') == 'left-space') echo 'selected';?> ><?= ('left_with_a_space'); ?></option>
                <option value="right-space" <?php if ($this->crud_model->get_settings('currency_position') == 'right-space') echo 'selected';?> ><?= ('right_with_a_space'); ?></option>
            </select>
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-light btn-orange mt-2">Update System Currency</button>
          </div>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4>Paystack Settings</h4>
        <form method="post" action="<?= base_url('admin/payment_settings/paystack'); ?>">
        <div class="row">
            <div class="form-group col-6">
              <label for="name">Active</label>
              <select class="form-control select2" id="source" name="paystack_active" data-init-plugin="select2" >
                <option value="0"
                  <?php if ($paystack[0]->active == 0) echo 'selected';?>>
                  <?= ('no');?></option>
                <option value="1"
                  <?php if ($paystack[0]->active == 1) echo 'selected';?>>
                  <?= ('yes');?></option>
              </select>
            </div>

            <div class="form-group col-6">
              <label for="name">Mode</label>
              <select class="form-control select2" id="source" name="paystack_mode" data-init-plugin="select2" >
                <option value="sandbox"
                  <?php if ($paystack[0]->mode == 'sandbox') echo 'selected';?>>
                  <?= ('sandbox');?></option>
                <option value="production"
                  <?php if ($paystack[0]->mode == 'production') echo 'selected';?>>
                  <?= ('production');?></option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="name">Public Key (Sandbox)</label>
            <input type="text" class="form-control" name="sandbox_public_key" value="<?= $paystack[0]->sandbox_public_key;?>"  />
          </div>
          <div class="form-group">
            <label for="name">Private Key (Sandbox)</label>
            <input type="text" class="form-control" name="sandbox_private_key" value="<?= $paystack[0]->sandbox_private_key;?>"  />
          </div>
          <div class="form-group">
            <label for="name">Public Key (Production)</label>
            <input type="text" class="form-control" name="production_public_key" value="<?= $paystack[0]->production_public_key;?>"  />
          </div>
          <div class="form-group">
            <label for="name">Private Key (Production)</label>
            <input type="text" class="form-control" name="production_private_key" value="<?= $paystack[0]->production_private_key;?>"  />
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-light btn-orange mt-2">Update Paystack Settings</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h4>Interswitch Settings</h4>
        <form method="post" action="<?= base_url('admin/payment_settings/interswitch'); ?>">
          <div class="form-group">
            <label for="name">Active</label>
            <select class="form-control select2" id="source" name="interswitch_active" data-init-plugin="select2" >
              <option value="0"
                      <?php if ($interswitch[0]->active == 0) echo 'selected';?>>
                          <?= ('no');?></option>
              <option value="1"
                  <?php if ($interswitch[0]->active == 1) echo 'selected';?>>
                      <?= ('yes');?></option>

            </select>
          </div>

          <div class="form-group">
            <label for="name">Test Mode</label>
            <select class="form-control select2" id="source" name="testmode" data-init-plugin="select2" >
              <option value="on"
                 <?php if ($interswitch[0]->testmode == 'on') echo 'selected';?>>
                     <?= ('on');?></option>
              <option value="off"
                 <?php if ($interswitch[0]->testmode == 'off') echo 'selected';?>>
                     <?= ('off');?></option>
            </select>
          </div>

          <div class="form-group">
            <label for="name">Test Secret Key</label>
            <input type="text" class="form-control" name="secret_key" value="<?= $interswitch[0]->secret_key;?>"  />
          </div>

          <div class="form-group">
            <label for="name">Test Public Key</label>
            <input type="text" class="form-control" name="public_key" value="<?= $interswitch[0]->public_key;?>"  />
          </div>

          <div class="form-group">
            <label for="name">Live Secret Key</label>
            <input type="text" class="form-control" name="secret_live_key" value="<?= $interswitch[0]->secret_live_key;?>"  />
          </div>

          <div class="form-group">
            <label for="name">Live Public Key</label>
            <input type="text" class="form-control" name="public_live_key" value="<?= $interswitch[0]->public_live_key;?>"  />
          </div>


          <div class="form-group text-center">
            <button type="submit" class="btn btn-light btn-orange mt-2">Update Interswitch Settings</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</div>
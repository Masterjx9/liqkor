# Liqkor: LiquidWeb Docker Plugin for InterWorx

Liqkor is a plugin designed to help users generate Dockerfiles from InterWorx user accounts for local testing and development.

## Installation and Usage

### Step 1: Create Plugin Directory
Create a new directory for your plugin in the InterWorx plugins directory:
```sh
mkdir /usr/local/interworx/plugins/liqkor
```

### Step 2: Implement Controller and Views
InterWorx plugins are typically written in PHP and utilize the Smarty template engine for views. You need to create a PHP file for your controller and Smarty templates for your views.
Controller (controller.php)
```php
<?php
class Liqkor_Controller
{
    public function indexAction()
    {
        // Logic to list user accounts
        $accounts = $this->listAccounts();
        // Display accounts in the view
        $this->view->assign('accounts', $accounts);
    }

    public function generateAction()
    {
        // Logic to generate Dockerfiles
        // ...
        $this->view->assign('result', 'Docker files generated successfully.');
    }

    private function listAccounts()
    {
        // Implement logic to list user accounts
        // You might need to interact with InterWorx API or other mechanisms
        return ['account1', 'account2', 'account3'];
    }
}
```
View (index.tpl)
```tpl
<form method="post" action="{$base_url}/liqkor/generate">
  {foreach from=$accounts item=account}
    <input type="checkbox" name="accounts[]" value="{$account|escape}">{$account|escape}<br>
  {/foreach}
  <input type="submit" value="Generate Docker Files">
</form>
```
Result View (generate.tpl)
```tpl
<p>{$result|escape}</p>
```

### Step 3: Register Plugin with InterWorx
After implementing the controller and views, you need to register the plugin with InterWorx:
```sh
/usr/local/interworx/bin/nodeworx -u -c Plugin -a add --name liqkor --controller Liqkor_Controller --path /usr/local/interworx/plugins/liqkor
```

### Step 4: Access the Plugin
Now that the plugin is registered, you should be able to access it from the InterWorx control panel.
Navigate to https://<your-server-ip>:2443/nodeworx/plugins, and you should see the Liqkor plugin listed there. Click on it to access the functionality implemented in the previous steps.
```css
Make sure to adjust the paths, URLs, and logic according to your actual server setup and requirements.
```
# Liqkor: LiquidWeb Docker Plugin for Plesk

Liqkor is a plugin designed to help users generate Dockerfiles from Plesk user accounts for local testing and development.

## Installation and Usage

### Step 1: Create and Install Extension
Create a new extension using the Plesk command-line utility:

```sh
plesk bin extension --create liqkor
plesk bin extension --register liqkor
```

### Step 2: Implement Controller
Create a controller at /usr/local/psa/admin/plib/modules/liqkor/controllers/IndexController.php

```php
<?php

class IndexController extends pm_Controller_Action
{
    public function indexAction()
    {
        $this->view->accounts = $this->listAccounts();
    }

    public function generateAction()
    {
        $selectedAccounts = $this->getRequest()->getParam('accounts', []);
        foreach ($selectedAccounts as $account) {
            $this->generateDockerFile($account);
        }
        $this->view->result = 'Docker files generated successfully.';
    }

    private function listAccounts()
    {
        // Implement logic to list user accounts
        // You might need to use Plesk API or other mechanisms
        return ['account1', 'account2', 'account3'];
    }

    private function generateDockerFile($account)
    {
        $dockerContent = "FROM ... \n";
        // Add other necessary Dockerfile commands
        // Use $account data as necessary
        // Save $dockerContent to a file or do something else with it
    }
}

```

### Step 3: Implement Views
Create views to display the user interface.
List Accounts (index.phtml):
```html
<form method="post" action="<?= $this->url('generate'); ?>">
    <?php foreach ($this->accounts as $account): ?>
        <input type="checkbox" name="accounts[]" value="<?= $this->escape($account); ?>"><?= $this->escape($account); ?><br>
    <?php endforeach; ?>
    <input type="submit" value="Generate Docker Files">
</form>
```
Show Result (generate.phtml):
```html
<p><?= $this->escape($this->result); ?></p>
```

### Step 4: Pack Extension
Package the extension:
```sh
plesk bin extension --pack liqkor
```

### Step 5: Add Icons and Screenshots
Follow the provided directory structure to add necessary icons and screenshots.

###  Step 6: Update the Meta File
Update the meta.xml file with appropriate metadata about the extension.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<module>
   <id>liqkor</id>
   <name>Liqkor</name>
   <description>LiquidWeb Docker Plugin for Plesk</description>
   <version>1.0</version>
   <release>1</release>
   <vendor>Your Company</vendor>
   <url>https://yourcompany.com/liqkor</url>
   <plesk_min_version>17.0</plesk_min_version>
</module>
```
<?php

class Liqkor_Controller
{
    public function indexAction()
    {
        $accounts = $this->listAccounts();
        $this->view->assign('accounts', $accounts);
        $this->view->display('index.tpl');
    }

    public function generateAction()
    {
        $selectedAccounts = $_POST['accounts'] ?? [];
        foreach ($selectedAccounts as $account) {
            $this->generateDockerFile($account);
        }
        echo 'Docker files generated successfully.';
    }

    private function listAccounts()
    {
        // Implement logic to list user accounts
        // You might need to use InterWorx API or other mechanisms
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

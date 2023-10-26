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

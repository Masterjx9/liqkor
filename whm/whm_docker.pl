#!/usr/bin/perl

use strict;
use warnings;
use CGI;
use WHM::API;

my $cgi = CGI->new;

sub list_cpanel_accounts {
    my $api = WHM::API->new();
    my $accounts = $api->listaccts();
    return $accounts;
}

sub generate_docker_file {
    my ($account) = @_;
    my $docker_content = "FROM ... \n";  # Define as necessary
    # Add other necessary Dockerfile commands
    # Use $account data as necessary
    return $docker_content;
}

sub main {
    print $cgi->header;
    print $cgi->start_html('Generate Docker Files');
    
    if ($cgi->param('submit')) {
        my @selected_accounts = $cgi->param('accounts');
        foreach my $account (@selected_accounts) {
            my $docker_file = generate_docker_file($account);
            # Save $docker_file to a file or do something else with it
        }
        print $cgi->p('Docker files generated successfully.');
    } else {
        my $accounts = list_cpanel_accounts();
        print $cgi->start_form;
        foreach my $account (@$accounts) {
            print $cgi->checkbox(-name=>'accounts', -value=>$account, -label=>$account);
        }
        print $cgi->submit(-name=>'submit', -value=>'Generate Docker Files');
        print $cgi->end_form;
    }
    
    print $cgi->end_html;
}

main();

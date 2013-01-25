<?php

$CURDIR = dirname(__file__);
require_once( dirname($CURDIR) . '/clients/loghog.php');

# NOTE: In order to use this example, you must generate a client certificate.
# Simply use the loghog-client-cert command on the machine that will 
# run loghogd:
#
#   $ sudo loghog-client-cert `hostname`
#
# The above will generate a file called `hostname`.pem. Use this file with
# your project, along with loghogd-ca.cert to encrypt all traffc between
# your application and the server

$logger = new Loghog('my-first-app', array(
    'port' => 5577,
    'pemfile' => 'PATH/TO/CLIENT.pem',
    'cacert' => '/etc/loghogd/certs/loghogd-ca.cert'
));

while (1) {
    $logger->debug('And %s and %s and %s', '1', 'b', 'C');
    sleep(1);
}

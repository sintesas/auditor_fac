<?php
if (strlen(decbin(~0)) === 32) {
    echo "Es de 32 bits";
} else {
    echo "Es de 64 bits";
}
phpinfo();

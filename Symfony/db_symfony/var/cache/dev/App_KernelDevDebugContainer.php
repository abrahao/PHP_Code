<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerTLkqGyI\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerTLkqGyI/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerTLkqGyI.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerTLkqGyI\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerTLkqGyI\App_KernelDevDebugContainer([
    'container.build_hash' => 'TLkqGyI',
    'container.build_id' => '0e721357',
    'container.build_time' => 1674565448,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerTLkqGyI');

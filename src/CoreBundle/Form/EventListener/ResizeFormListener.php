<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CoreBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

@trigger_error(
    'The '.__NAMESPACE__.'\ResizeFormListener class is deprecated since version 3.x and will be removed in 4.0.'
    .' Use Sonata\Form\EventListener\ResizeFormListener instead.',
    E_USER_DEPRECATED
);

/**
 * @deprecated Since version 3.x, to be removed in 4.0.
 */
class ResizeFormListener extends \Sonata\Form\EventListener\ResizeFormListener
{
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preBind',
            FormEvents::SUBMIT => 'onBind',
        ];
    }

    /**
     * NEXT_MAJOR: remove this method.
     *
     * @deprecated Since version 2.3, to be renamed in 4.0.
     *             Use {@link preSubmit} instead
     */
    public function preBind(FormEvent $event)
    {
        // BC prevention for class extending this one.
        if (self::class !== \get_called_class()) {
            @trigger_error(
                __METHOD__.' method is deprecated since 2.3 and will be renamed in 4.0.'
                .' Use '.__CLASS__.'::preSubmit instead.',
                E_USER_DEPRECATED
            );
        }

        $this->preSubmit($event);
    }

    /**
     * NEXT_MAJOR: remove this method.
     *
     * @deprecated Since version 2.3, to be removed in 4.0.
     *             Use {@link onSubmit} instead
     */
    public function onBind(FormEvent $event)
    {
        // BC prevention for class extending this one.
        if (self::class !== \get_called_class()) {
            @trigger_error(
                __METHOD__.' is deprecated since 2.3 and will be renamed in 4.0.'
                .' Use '.__CLASS__.'::onSubmit instead.',
                E_USER_DEPRECATED
            );
        }

        $this->onSubmit($event);
    }
}

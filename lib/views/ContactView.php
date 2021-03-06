<?php
/**
 * Created by PhpStorm.
 * User: florianauderset
 * Date: 27.11.15
 * Time: 08:59
 */

class ContactView
{
    public function __construct() {

    }

    public function render() {
        echo "
            <div class='content'>
                <div class='container'>
                    <div class='p-content'>
                        <div class='p-content-header'>
                            <div class='p-content-header-left'>
                                 <h1>" . Trans::_('Contactform') . "</h1>
                            </div>
                            <div class='p-content-header-right'>

                            </div>
                            <div class='clearfix'> </div>
                        </div>

                        <form class='form-horizontal'>
                            <fieldset>
                            <!-- Text input-->
                            <div class='form-group'>
                              <label class='col-md-4 control-label' for='name'>" . Trans::_('name') . "</label>
                              <div class='col-md-4'>
                              <input id='name' name='name' type='text' placeholder='' class='form-control input-md' disabled>

                              </div>
                            </div>

                            <!-- Text input-->
                            <div class='form-group'>
                              <label class='col-md-4 control-label' for='email'>" . Trans::_('email') . "</label>
                              <div class='col-md-4'>
                              <input id='email' name='email' type='text' placeholder='' class='form-control input-md' disabled>

                              </div>
                            </div>

                            <!-- Textarea -->
                            <div class='form-group'>
                              <label class='col-md-4 control-label' for='message'>" . Trans::_('message') . "</label>
                              <div class='col-md-4'>
                                <textarea class='form-control' id='message' name='message' rows='4' disabled></textarea>
                              </div>
                            </div>

                            <!-- Button -->
                            <div class='form-group'>
                              <label class='col-md-4 control-label' for='submit'></label>
                              <div class='col-md-4'>
                                <button id='submit' name='submit' type='submit' class='btn btn-default' disabled>" . Trans::_('submit') . "</button>
                              </div>
                            </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }
}

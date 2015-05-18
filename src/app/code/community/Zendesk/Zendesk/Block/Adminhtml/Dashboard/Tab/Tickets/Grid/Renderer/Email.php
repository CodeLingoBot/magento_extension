<?php

/**
 * Copyright 2013 Zendesk.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class Zendesk_Zendesk_Block_Adminhtml_Dashboard_Tab_Tickets_Grid_Renderer_Email extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        $users = Mage::registry('zendesk_users');
        $value = (int) $row->getData($this->getColumn()->getIndex());

        if ($users) {
            $found = array_filter($users, function($user) use($value) {
                return (int) $user['id'] === $value;
            }); 
        } else {
            return ''; 
        }   
    
        if( count($found) ) { 
            $user = array_shift($found);
    
            return $user['email'];
        }   
    
        return ''; 
    } 

}

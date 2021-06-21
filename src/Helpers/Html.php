<?php

class Html
{
    public static function createCustomHtml($tag, $id = '', $value = "", $style = '', $extraAttributes = ''){
        $html = '<'.$tag.' id="' . $id . '" style="'.$style.'" '.$extraAttributes.'> ' . $value . '</'.$tag.'>';
        return $html;
    }
    public static function createTable($id, $array = [],$style = ''){


        $html = '<table id="' . $id . '" style="'.$style.'"> ';
        foreach ($array as $row)
        {
            $html .=     '<tr>';
            foreach ($row as $column)
            {
                $html .=     '<th>'.$column.'</th>';
            }
            $html .=     "</tr>";
        }
        $html .='</table>';

        return $html;
    }
    public static function createLabel($id, $text = ""){
        $html = '<label id="' . $id . '"> ' . $text . '</label>';
        return $html;
    }

    public static function createContainer($id, $data = [],$style = ''){
        $html = '<div id="'.$id.'" style="'.$style.'">'.implode("", $data).'</div>';
        return $html;
    }

    public static function createInput($id, $name, $type = 'text',$value = '',$style = ''){
        $html = '<input type="' . $type . '" style="' . $style . ' " id="' . $id . '" name="' . $name . '" value="' . $value . '">';
        return $html;
    }

    public static function createForm($data = [], $method = "GET", $endpoint = "#",$buttonValue = "Submit",$id = '')
    {
        $html =
            '<form id = "'.$id.'" method = ' . $method . ' action="' . $endpoint . '">
              ' . implode("", $data) . '<br>
              <input type="submit" value="'.$buttonValue.'"><br>
            </form>';

        return $html;
    }

    public static function createSection($data = [],$style = '')
    {
        $html =
            '<section class="sec-projects" role="section" style="'.$style.'">
             ' . implode("", $data) . '
            </section>';

        return $html;
    }

    public static function createHr()
    {
        $html =
            '<hr />';
        return $html;
    }

    public static function createH1($data)
    {
        $html =
            '<h1>' . $data . '</h1>';
        return $html;
    }
    public static function createH2($data)
    {
        $html =
            '<h3>' . $data . '</h3>';
        return $html;
    }
    public static function createP($data)
    {
        $html =
            '<p>' . $data . '</p>';
        return $html;
    }

    public static function createArticle($data = [])
    {
        $html =
            '<article>
             ' . implode("", $data) . '
            </article>';

        return $html;
    }


}
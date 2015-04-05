<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 
?>

<html lang="en"><script type="text/javascript">window["_gaUserPrefs"] = { ioo : function() { return true; } }</script><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Modules Selection</title>

    <!-- build:css(.) _/css/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.) _/css/bidding_mgt.css -->
    <link rel="stylesheet" href="styles/module_selection.css">
    <!-- endbuild -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css"></style></head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NUS Centralised Online Registration System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <a href='logout.php'><button type="button" class="btn btn-default navbar-btn" id="signOutButton">Sign Out</button></a>
        </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Modules Selection <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Bidding Management</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modules Selection</h1>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <td>
                  <div id="cur_round"><b>Academic Year </b>2003/2004 </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="table-responsive">
          <div id="table-wrapper">
            <div id="table-scroll">
            <table>
            <thead>
            <tr>
            <th><span class="text">A</span></th>
            <th><span class="text">B</span></th>
            <th><span class="text">C</span></th>
            </tr>
            </thead>
            <tbody>
            <tr> <td>1, 0</td> <td>2, 0</td> <td>3, 0</td> </tr>
            <tr> <td>1, 1</td> <td>2, 1</td> <td>3, 1</td> </tr>
            <tr> <td>1, 2</td> <td>2, 2</td> <td>3, 2</td> </tr>
            <tr> <td>1, 3</td> <td>2, 3</td> <td>3, 3</td> </tr>
            <tr> <td>1, 4</td> <td>2, 4</td> <td>3, 4</td> </tr>
            <tr> <td>1, 5</td> <td>2, 5</td> <td>3, 5</td> </tr>
            <tr> <td>1, 6</td> <td>2, 6</td> <td>3, 6</td> </tr>
            <tr> <td>1, 7</td> <td>2, 7</td> <td>3, 7</td> </tr>
            <tr> <td>1, 8</td> <td>2, 8</td> <td>3, 8</td> </tr>
            <tr> <td>1, 9</td> <td>2, 9</td> <td>3, 9</td> </tr>
            <tr> <td>1, 10</td> <td>2, 10</td> <td>3, 10</td> </tr>
            <tr> <td>1, 11</td> <td>2, 11</td> <td>3, 11</td> </tr>
            <tr> <td>1, 12</td> <td>2, 12</td> <td>3, 12</td> </tr>
            <tr> <td>1, 13</td> <td>2, 13</td> <td>3, 13</td> </tr>
            <tr> <td>1, 14</td> <td>2, 14</td> <td>3, 14</td> </tr>
            <tr> <td>1, 15</td> <td>2, 15</td> <td>3, 15</td> </tr>
            <tr> <td>1, 16</td> <td>2, 16</td> <td>3, 16</td> </tr>
            <tr> <td>1, 17</td> <td>2, 17</td> <td>3, 17</td> </tr>
            <tr> <td>1, 18</td> <td>2, 18</td> <td>3, 18</td> </tr>
            <tr> <td>1, 19</td> <td>2, 19</td> <td>3, 19</td> </tr>
            <tr> <td>1, 20</td> <td>2, 20</td> <td>3, 20</td> </tr>
            <tr> <td>1, 21</td> <td>2, 21</td> <td>3, 21</td> </tr>
            <tr> <td>1, 22</td> <td>2, 22</td> <td>3, 22</td> </tr>
            <tr> <td>1, 23</td> <td>2, 23</td> <td>3, 23</td> </tr>
            <tr> <td>1, 24</td> <td>2, 24</td> <td>3, 24</td> </tr>
            <tr> <td>1, 25</td> <td>2, 25</td> <td>3, 25</td> </tr>
            <tr> <td>1, 26</td> <td>2, 26</td> <td>3, 26</td> </tr>
            <tr> <td>1, 27</td> <td>2, 27</td> <td>3, 27</td> </tr>
            <tr> <td>1, 28</td> <td>2, 28</td> <td>3, 28</td> </tr>
            <tr> <td>1, 29</td> <td>2, 29</td> <td>3, 29</td> </tr>
            <tr> <td>1, 30</td> <td>2, 30</td> <td>3, 30</td> </tr>
            <tr> <td>1, 31</td> <td>2, 31</td> <td>3, 31</td> </tr>
            <tr> <td>1, 32</td> <td>2, 32</td> <td>3, 32</td> </tr>
            <tr> <td>1, 33</td> <td>2, 33</td> <td>3, 33</td> </tr>
            <tr> <td>1, 34</td> <td>2, 34</td> <td>3, 34</td> </tr>
            <tr> <td>1, 35</td> <td>2, 35</td> <td>3, 35</td> </tr>
            <tr> <td>1, 36</td> <td>2, 36</td> <td>3, 36</td> </tr>
            <tr> <td>1, 37</td> <td>2, 37</td> <td>3, 37</td> </tr>
            <tr> <td>1, 38</td> <td>2, 38</td> <td>3, 38</td> </tr>
            <tr> <td>1, 39</td> <td>2, 39</td> <td>3, 39</td> </tr>
            <tr> <td>1, 40</td> <td>2, 40</td> <td>3, 40</td> </tr>
            <tr> <td>1, 41</td> <td>2, 41</td> <td>3, 41</td> </tr>
            <tr> <td>1, 42</td> <td>2, 42</td> <td>3, 42</td> </tr>
            <tr> <td>1, 43</td> <td>2, 43</td> <td>3, 43</td> </tr>
            <tr> <td>1, 44</td> <td>2, 44</td> <td>3, 44</td> </tr>
            <tr> <td>1, 45</td> <td>2, 45</td> <td>3, 45</td> </tr>
            <tr> <td>1, 46</td> <td>2, 46</td> <td>3, 46</td> </tr>
            <tr> <td>1, 47</td> <td>2, 47</td> <td>3, 47</td> </tr>
            <tr> <td>1, 48</td> <td>2, 48</td> <td>3, 48</td> </tr>
            <tr> <td>1, 49</td> <td>2, 49</td> <td>3, 49</td> </tr>
            <tr> <td>1, 50</td> <td>2, 50</td> <td>3, 50</td> </tr>
            <tr> <td>1, 51</td> <td>2, 51</td> <td>3, 51</td> </tr>
            <tr> <td>1, 52</td> <td>2, 52</td> <td>3, 52</td> </tr>
            <tr> <td>1, 53</td> <td>2, 53</td> <td>3, 53</td> </tr>
            <tr> <td>1, 54</td> <td>2, 54</td> <td>3, 54</td> </tr>
            <tr> <td>1, 55</td> <td>2, 55</td> <td>3, 55</td> </tr>
            <tr> <td>1, 56</td> <td>2, 56</td> <td>3, 56</td> </tr>
            <tr> <td>1, 57</td> <td>2, 57</td> <td>3, 57</td> </tr>
            <tr> <td>1, 58</td> <td>2, 58</td> <td>3, 58</td> </tr>
            <tr> <td>1, 59</td> <td>2, 59</td> <td>3, 59</td> </tr>
            <tr> <td>1, 60</td> <td>2, 60</td> <td>3, 60</td> </tr>
            <tr> <td>1, 61</td> <td>2, 61</td> <td>3, 61</td> </tr>
            <tr> <td>1, 62</td> <td>2, 62</td> <td>3, 62</td> </tr>
            <tr> <td>1, 63</td> <td>2, 63</td> <td>3, 63</td> </tr>
            <tr> <td>1, 64</td> <td>2, 64</td> <td>3, 64</td> </tr>
            <tr> <td>1, 65</td> <td>2, 65</td> <td>3, 65</td> </tr>
            <tr> <td>1, 66</td> <td>2, 66</td> <td>3, 66</td> </tr>
            <tr> <td>1, 67</td> <td>2, 67</td> <td>3, 67</td> </tr>
            <tr> <td>1, 68</td> <td>2, 68</td> <td>3, 68</td> </tr>
            <tr> <td>1, 69</td> <td>2, 69</td> <td>3, 69</td> </tr>
            <tr> <td>1, 70</td> <td>2, 70</td> <td>3, 70</td> </tr>
            <tr> <td>1, 71</td> <td>2, 71</td> <td>3, 71</td> </tr>
            <tr> <td>1, 72</td> <td>2, 72</td> <td>3, 72</td> </tr>
            <tr> <td>1, 73</td> <td>2, 73</td> <td>3, 73</td> </tr>
            <tr> <td>1, 74</td> <td>2, 74</td> <td>3, 74</td> </tr>
            <tr> <td>1, 75</td> <td>2, 75</td> <td>3, 75</td> </tr>
            <tr> <td>1, 76</td> <td>2, 76</td> <td>3, 76</td> </tr>
            <tr> <td>1, 77</td> <td>2, 77</td> <td>3, 77</td> </tr>
            <tr> <td>1, 78</td> <td>2, 78</td> <td>3, 78</td> </tr>
            <tr> <td>1, 79</td> <td>2, 79</td> <td>3, 79</td> </tr>
            <tr> <td>1, 80</td> <td>2, 80</td> <td>3, 80</td> </tr>
            <tr> <td>1, 81</td> <td>2, 81</td> <td>3, 81</td> </tr>
            <tr> <td>1, 82</td> <td>2, 82</td> <td>3, 82</td> </tr>
            <tr> <td>1, 83</td> <td>2, 83</td> <td>3, 83</td> </tr>
            <tr> <td>1, 84</td> <td>2, 84</td> <td>3, 84</td> </tr>
            <tr> <td>1, 85</td> <td>2, 85</td> <td>3, 85</td> </tr>
            <tr> <td>1, 86</td> <td>2, 86</td> <td>3, 86</td> </tr>
            <tr> <td>1, 87</td> <td>2, 87</td> <td>3, 87</td> </tr>
            <tr> <td>1, 88</td> <td>2, 88</td> <td>3, 88</td> </tr>
            <tr> <td>1, 89</td> <td>2, 89</td> <td>3, 89</td> </tr>
            <tr> <td>1, 90</td> <td>2, 90</td> <td>3, 90</td> </tr>
            <tr> <td>1, 91</td> <td>2, 91</td> <td>3, 91</td> </tr>
            <tr> <td>1, 92</td> <td>2, 92</td> <td>3, 92</td> </tr>
            <tr> <td>1, 93</td> <td>2, 93</td> <td>3, 93</td> </tr>
            <tr> <td>1, 94</td> <td>2, 94</td> <td>3, 94</td> </tr>
            <tr> <td>1, 95</td> <td>2, 95</td> <td>3, 95</td> </tr>
            <tr> <td>1, 96</td> <td>2, 96</td> <td>3, 96</td> </tr>
            <tr> <td>1, 97</td> <td>2, 97</td> <td>3, 97</td> </tr>
            <tr> <td>1, 98</td> <td>2, 98</td> <td>3, 98</td> </tr>
            <tr> <td>1, 99</td> <td>2, 99</td> <td>3, 99</td> </tr>
            </tbody>
            </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;dominant-baseline:middle">200x200</text></svg></body></html>
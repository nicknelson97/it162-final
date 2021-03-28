<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>

     <!-- START LEFT COLUMN -->
       <section class="blog">
           <h2 class="subheader">How to avoid SQL Injection by using Prepared Statements with Dynamic Table Names</h2>
                   <p>Java Prepared Statements are a good and easy way to avoid SQL Injection when performing SQL database operations in Java code. However, in the case where you want to specify the table name to query or interact with based on outside input, it can be difficult to use Prepared Statements to avoid SQL injection.</p>
               <h3>Why use Prepared Statements in the first place?</h3>
                   <p>SQL Injection is a highly dangerous form of injection where an attacker can manipulate arbitrary data within a database. It is incredibly important to guard your web applications from this attack. When a user needs to retrieve data from the database, the Java code that interprets the HTTP Request into a database query should be a layer of defense against injection attacks.</p>
               <h3>What is a Prepared Statement?</h3>
                   <p>A prepared statement separates the input from the query within a database statement. The query is created using "?" as a placeholder for the input parameter, and prevents malicious input from being treated as part of the query.
                   For more details, please Google "prepared statement java" since further details are beyond the scope of this post.</p>
               <h3>Dynamic Table Names</h3>
                   <p>If the code you are working with needs to vary the queried table based on outside input, it may look something like this:</p>
                   <code>
                    String query = "SELECT * FROM " + request.getParameter("tableName");<br />
                    Statement s = connection.createStatement();<br />
                    ResultSet rs = s.executeQuery(query);
                   </code>
                   <p>In this case, a prepared statement cannot be used. The parameterization of the input does not work for table names. Therefore, preventing SQL injection becomes more difficult than just using prepared statements.</p>
               <h3>Solution 1: Refactor</h3>
                   <p>This is not always feasible if the codebase is large and complicated, or you are not able to make architectural database changes.</p>
               <h3>Solution 2: Whitelist</h3>
                   <p>If one first gets a list of all current table names from the database metadata, and uses that list to confirm the outside input matches a valid input, then SQLi can be prevented.</p>
                    <code>   ResultSet rs = connection.getMetaData().getTables(null,null,null,null); <br /> 
                            String validTableName = null;<br /> 
                            while(rs.next()){<br /> 
                                if(rs.getString(3) == request.getParameter("tableName")){<br /> 
                                    validTableName = rs.getString(3);}<br /> 
                            }<br /> 
                            if(validTableName != null){<br /> 
                                PreparedStatement ps = connection.prepareStatement("SELECT * FROM " + validTableName + " WHERE ID = ?);<br /> 
                                ps.setInt(1, request.getParameter("ID"));<br /> 
                                ResultSet rsQuery = ps.executeQuery();<br /> 
                            }else{<br /> 
                            //handle error<br /></code>
                    <p>It is important to use the value returned from the database if you are using any sort of static analysis tool, since it prevents the tainted data from being used in the query.</p>
       </section>
<!-- END LEFT COLUMN -->

<?php include('includes/footer.php'); ?>
  </main>
 </body>
</html>
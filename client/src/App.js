import React from "react";
import { Header, Footer } from "@controls";
import { Text, Anchor, Grid, Box } from "grommet";
import PocketBase from "pocketbase";

const client = new PocketBase("http://127.0.0.1:8090");

async function fetchValues() {
  
  // admin authentication via email/pass
  const adminAuthData = await client.admins.authViaEmail('namutenya.ch@gmail.com', 'celinehaiketi');
  
// alternatively you can also fetch all records at once via getFullList:
const records = await client.records.getFullList('jobs', 200 /* batch size */, {
  sort: '-created',
});
  console.log("records", records);
  localStorage.setItem("token", adminAuthData.token);
}

const App = () => {
  fetchValues();
  return (
    <div>
      <Header />
      <Grid
        rows={["auto", "flex"]}
        columns={["auto", "flex"]}
        gap="small"
      >
        <Box gridArea="header" background="brand" />
        <Box gridArea="main" background="light-2" />

        <Box gridArea="sidebar" background="light-4" />
        <Box gridArea="footer" background="brand" />
      </Grid>
    </div>
  );
};

export default App;

import React from "react";
import { Header, Footer } from "@controls";
import { Text, Anchor, Grid, Box } from "grommet";
import PocketBase from 'pocketbase';

const client = new PocketBase('http://127.0.0.1:8090');

async function fetchValues(){

// fetch a paginated records list
const resultList = await client.records.getList('jobs', 1, 50, {
    filter: 'created >= "2022-01-01 00:00:00"',
});

// alternatively you can also fetch all records at once via getFullList:
const records = await client.records.getFullList('jobs', 200 /* batch size */, {
    sort: '-created',
});
console.log('records', records);
}

const App = () => {
 fetchValues();
  return (
    <div>
      <Grid
        rows={["xxsmall", "xsmall"]}
        columns={["xsmall", "small"]}
        gap="small"
        areas={[
          { name: "header", start: [0, 0], end: [1, 0] },
          { name: "nav", start: [0, 1], end: [0, 1] },
          { name: "main", start: [1, 1], end: [1, 1] }
        ]}
      >
        <Box gridArea="header" background="brand" />
        <Box gridArea="nav" background="light-5" />
        <Box gridArea="main" background="light-2" />
      </Grid>
    </div>
  );
};

export default App;
